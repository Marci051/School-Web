<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculater</title>
    <style>
        body {
            direction: rtl;
            display: flex;
            justify-content: center;
            font-family: "B Nazanin";
            background-color: skyblue;
        }

        input,
        select,
        button {
            font-family: "B Nazanin";
            width: 100%;
            margin: auto;
        }
    </style>
</head>

<body>
    <form action="calculater.php" onsubmit="calculate()" method="POST">
        <table>
            <tr>
                <td><input type="text" name="num1" placeholder="عدد اول" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>"></td>

            </tr>
            <tr>
                <td>
                    <select name="operator" id="" <?= empty($_POST['operator']) ? 'selected' : '' ?>>
                        <option value="choose" disabled selected>انتخاب کنید</option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">×</option>
                        <option value="/">÷</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td><input type="text" name="num2" placeholder="عدد دوم" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>"></td>

            </tr>
            <tr>
                <td><button type="submit">محاسبه</button></td>

            </tr>
            <?php
            $result = "";

            if (
                isset($_POST['num1']) && !empty($_POST['num1']) &&
                isset($_POST['num2']) && !empty($_POST['num2']) &&
                isset($_POST['operator']) && !empty($_POST['operator'])
            ) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operator = $_POST['operator'];
                $result = "";
                if (is_numeric($num1) && is_numeric($num2)) {
                    if ($operator === "choose") {
                        $result = "لطفاً یک عملگر انتخاب کنید!";
                    }
                    switch ($operator) {
                        case "+":
                            $result = $num1 + $num2;
                            break;

                        case "-":
                            $result = $num1 - $num2;
                            break;

                        case "*":
                            $result = $num1 * $num2;
                            break;

                        case "/":
                            if ($num2 != 0) {
                                $result = $num1 / $num2;
                            } else {
                                $result = "تقسیم بر صفر ممکن نیست!";
                            }
                            break;
                        default:
                            $result = "عملگر نامعتبر است!";
                    }
                } else {
                    $result = "ورودی‌ها باید عددی باشند!";
                }
            }
            ?>
            <tr>
                <td>
                    <input type="text" name="result" placeholder="نتیجه " value="<?= htmlspecialchars($result); ?>" readonly>

                </td>
            </tr>

            <tr>
                <td><button type="reset" onclick="window.location.reload();resetForm()">بازنشانی</button></td>

            </tr>
        </table>
    </form>
    <script>
        function resetForm() {
            document.querySelector('form').reset();
        }
    </script>
</body>

</html>