const BASE_API_PATH = "https://impactadvisoryservices.com/v1"
const userData = localStorage.getItem("userData") ?? null

function getJWTToken() {
    const jwtToken = localStorage.getItem("jwtToken") ?? null

    if ((jwtToken ?? "").trim() === "") {
        window.location.href = "/login"
        return
    }

    return jwtToken
}

async function postAPICall({ endPoint, payload, callbackBeforeSend, callbackComplete, callbackSuccess }) {
    $.ajax({
        url: `${BASE_API_PATH}${endPoint}`,
        method: 'POST',
        data: payload ?? {},
        contentType: 'application/json',
        headers: {
            'Authorization': `Bearer ${getJWTToken()}`
        },
        beforeSend: callbackBeforeSend ?? function () {
            loader.show();
        },
        complete: callbackComplete ?? function () {
            loader.hide();
        },
        success: callbackSuccess,
        error: async function (xhr, status, error, message) {
            let errorMessage = "Something went wrong";

            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            } else if (xhr.responseText) {
                try {
                    let parsedResponse = JSON.parse(xhr.responseText);
                    errorMessage = parsedResponse.message || errorMessage;
                } catch (e) {
                    errorMessage = xhr.responseText;
                }
            }

            if (['Unauthorized: Your account is in-active. Please contact admin.'].indexOf(errorMessage) >= 0) {
                toastr.error(errorMessage);
                    
                localStorage.removeItem("jwtToken")
                localStorage.removeItem("userData")

                window.location.href = "/login";
            }

            if (['jwt expired'].includes(errorMessage)) {
                try {
                    await refreshToken(); // Wait for the token refresh before retrying the API call

                    postAPICall({ endPoint, payload, callbackBeforeSend, callbackComplete, callbackSuccess });
                } catch (refreshError) {
                    toastr.error("Session expired! Please login again.");

                    localStorage.removeItem("jwtToken")
                    localStorage.removeItem("userData")
    
                    window.location.href = "/login";
                }

                return;
            }

            loader.hide();
            toastr.error(errorMessage);
        }
    });
}

async function refreshToken() {
    return new Promise(async (resolve, reject) => {
        await postAPICall({
            endPoint: "/auth/refresh-token",
            callbackBeforeSend: () => { },
            callbackComplete: () => { },
            callbackSuccess: (response) => {
                if (response.success) {
                    const jwtToken = response.data.jwtToken;
                    localStorage.setItem("jwtToken", jwtToken);
                    resolve(jwtToken);
                } else {
                    reject("Token refresh failed");
                }
            }
        })
    });
}

function onClickLogout() {
    postAPICall({
        endPoint: "/auth/logout",
        callbackSuccess: (response) => {
            if (response.success) {
                localStorage.removeItem("jwtToken")
                localStorage.removeItem("userData")

                window.location.href = "/login"
            }
        }
    })
}