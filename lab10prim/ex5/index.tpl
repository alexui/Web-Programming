<table>
    {include file="table_head.tpl"}
    <tbody>
        {foreach $persons as $person}
            {include file="table_entry.tpl" person=$person}
        {/foreach}
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
