<html>
<head>
<title>Info</title>
</head>
<body>

Persons:
<table>
	<th>
		<td>Name</td>
		<td>Age</td>
	</th>
	<tbody>
		{foreach from=$persons key=k item=v}
			<tr>
				<td>
					{$k}
				</td>
				<td>
					{$v.name}
				</td>
				<td>
					{$v.age}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>

</body>
</html>