<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <th>ID Number</th>
            <th>Office Name</th>
            <th>Address</th>
            <th>Group Name</th>
            <th>Holding Number</th>
        </thead>
        <tbody>
            <?php
            foreach ($offices as $office) {
                echo "<tr>";
                echo "<td> {$office['idNo']}</td>";
                echo "<td>{$office['name']}</td>";
                echo "<td> {$office['address']}</td>";
                echo "<td>{$office['groupName']}</td>";
                echo "<td> {$office['holdingNumber']}</td>";
                echo "</tr>";
            }
            ?> </tbody>

    </table>
</body>

</html>