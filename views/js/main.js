const generate = document.querySelector('#url');
const input = document.querySelector('textarea');
const btn = document.querySelector('#copy');
const img = document.querySelector('#check');

input.setAttribute("style", "display:none");
btn.setAttribute("style", "display:none");
img.setAttribute("style", "display:none");

function setLink() {
    input.setAttribute("style", "margin-top: 10px");
    btn.setAttribute("style", "background-color: #ffc107");

    btn.addEventListener('click', copyText);

    function copyText() {
        navigator.clipboard.writeText(input.value)
            .then(() => {
                if (!btn.querySelector("#check")) {
                    btn.appendChild(img);
                    btn.setAttribute("style", "background-color: #dc3545");
                }
            })
    }
}
generate.addEventListener('click', setLink,
    {
        once: true
    });