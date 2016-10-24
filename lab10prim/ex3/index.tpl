<table>
    <thead>
        <tr>
            <th>
                Nume 
            </th>
            <th>
                Varsta 
            </th>
        </tr>
    </thead>
{foreach $persons as $person}
    <tr>
        <td>{$person->name}</td>
        <td>{$person->age}</td>
    </tr>
{/foreach}
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>