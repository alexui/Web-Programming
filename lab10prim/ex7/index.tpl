<table>
    {include file="table_head.tpl"}
    <tbody>
        {foreach $expenses as $expense}
            {include file="table_entry.tpl" expense=$expense}
        {/foreach}
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
