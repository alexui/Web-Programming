<table>
    {include file="table_head.tpl"}
    <tbody>
        {foreach $persons as $person}
            <tr>
                <td>{$person->name}</td>
                <td>{$person->age}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
