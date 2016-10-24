<div>
    <ul>
    {for $p=0 to $page_count-1}
        <li>
            <a href="?page={$p}">
                {if $p == $page}
                    <b>Pagina {$p+1}</b>
                {else}
                    Pagina {$p+1}
                {/if}
            </a>
        </li>
    {/for}
    </ul>
</div>
