<form method="POST">
    <label for="nume">Nume</label>
    <input type="text" name="nume" id="nume" value="{if isset($nume)}{$nume}{/if}">
    <br>
    <label for="varsta">Varsta</label>
    <input type="text" name="varsta" id="varsta" value="{if isset($varsta)}{$varsta}{/if}">
    <br><br>
    <input type="submit" name="submit" value="Adauga persoana">
</form>

{if isset($errors)}
    <div>
    {foreach $errors as $error}
        <p>
            {$error}
        </p>
    {/foreach}
    </div>
{else}
    <div>
        <p>
            Persoana adaugata. 
        </p>
    </div>
{/if}