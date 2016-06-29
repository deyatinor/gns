<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Matrix input</h2>
@section('body')
		<div>
		{{$message}}
            <form method="post">
                Колонок в матрице <input type="text" name="xmatrix"><br/>
                Строк в матрице <input type="text" name="ymatrix"><br/>
                Координа х точки <input type="text" name="xpoint"><br/>
                Координа у точки <input type="text" name="ypoint"><br/>
                Координата - целое число, начинающееся с 1<br/>
                <input type="submit" value="Go!">
            </form>
		</div>
@show
	</body>
</html>
