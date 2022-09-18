const divAlertSuccessSession = document.getElementById('divAlertSucccessInfoChanged');
const btnCloseAlertSuccessSession = document.getElementById('btnAlertSucccessInfoChanged');

if (btnCloseAlertSuccessSession) {
    btnCloseAlertSuccessSession.addEventListener('click', () => {
        divAlertSuccessSession.remove();
    })
}