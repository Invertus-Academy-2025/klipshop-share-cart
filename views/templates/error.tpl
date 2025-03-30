{if isset($error)}
    <div class="alert alert-danger text-center" id="msg-error">
        {$error}
    </div>

    <script>
        setTimeout(removeError, 3000);

        function removeError() {
            document.querySelector('#msg-error').remove();
        }
    </script>
{/if}
