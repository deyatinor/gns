<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Matches</h2>

		<div>
			@foreach ($games as $game)
			<div>
			{{$game->Day}}|{{$game->HomeTeam}}|{{$game->AwayTeam}}|{{$game->StadiumID}}
			</div>
			@endforeach
		</div>
	</body>
</html>
