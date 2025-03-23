<link rel="stylesheet" type="text/css" href="{$module_dir}/views/css/main.css">

<div class="text-sm-center">
        <a href="#" class="btn btn-primary share" id="url">
            Share cart<img id="share-svg" src="{$module_dir}views/img/share.svg">
        </a>
</div>

{if isset($share_cart_link)}
    <div class="text-sm-center" id="wrap">

    </div>

    <script>

        const btn = document.querySelector('#url');

        function setLink() {
            let input = document.createElement("textarea");
            let btn = document.createElement("a");
            btn.setAttribute("class", "btn btn-primary share");
            btn.setAttribute("style", "background-color: #ffc107");
            btn.textContent = 'Copy to clipboard';
            input.value = "{$share_cart_link nofilter}";
            input.setAttribute('class', 'form-control');
            input.setAttribute('style', 'margin-top: 10px')
            input.setAttribute('readonly', 'true');
            const wrap = document.querySelector('#wrap');
            wrap.appendChild(input);
            wrap.appendChild(btn);

            btn.addEventListener('click', copyText);

            function copyText() {
                navigator.clipboard.writeText(input.value)
                    .then(() => {
                        if (!btn.querySelector("#share-svg")) {

                            const img = document.createElement("img");
                            img.src = "{$module_dir}views/img/check.svg";
                            img.setAttribute("id", "share-svg");
                            btn.appendChild(img);
                            btn.setAttribute("style", "background-color: #dc3545");
                        }
                    })
            }
        }

        btn.addEventListener('click', setLink,
            {
                once: true
            });
    </script>
{/if}