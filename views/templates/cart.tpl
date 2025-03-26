<div class="text-sm-center">
        <a href="#" class="btn btn-primary share" id="url">
            Share cart<img id="share-svg" src="{$module_dir}views/img/share.svg">
        </a>
</div>

{if isset($share_cart_link)}
    <div class="text-sm-center" id="wrap">
    <textarea class="form-control" style="margin-top: 10px" readonly>{$share_cart_link nofilter}</textarea>
        <a class="btn btn-primary share" id="copy">Copy to clipboard</a>
        <img id="check" src="{$module_dir}views/img/check.svg">
    </div>
{/if}