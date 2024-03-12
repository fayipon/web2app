<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小数点对齐</title>
    <style>
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td id="integer1"></td>
                <td>.</td>
                <td id="decimal1"></td>
            </tr>
            <tr>
                <td id="integer2"></td>
                <td>.</td>
                <td id="decimal2"></td>
            </tr>
            <tr>
                <td id="integer3"></td>
                <td>.</td>
                <td id="decimal3"></td>
            </tr>
            <tr>
                <td id="integer4"></td>
                <td>.</td>
                <td id="decimal4"></td>
            </tr>
        </tbody>
    </table>

    <script>
        const numbers = [
            "1.23",
            "2.1",
            "11.12",
            "100"
        ];

        numbers.forEach((number, index) => {
            const [integerPart, decimalPart] = number.split('.');
            document.getElementById(`integer${index + 1}`).textContent = integerPart;
            document.getElementById(`decimal${index + 1}`).textContent = decimalPart || '';
        });
    </script>
</body>
</html>