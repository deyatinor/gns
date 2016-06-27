<?php

class Game extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';
	
	protected $fillable = array('Day','DateTime', 'Season', 'SeasonType', 'AwayTeamID', 'HomeTeamID', 'RescheduledGameID', 'StadiumID', 'Channel', 'Inning', 'AwayTeamRuns', 'HomeTeamRuns', 'AwayTeamHits', 'HomeTeamHits', 'AwayTeamErrors', 'HomeTeamErrors', 'WinningPitcherID', 'LosingPitcherID', 'SavingPitcherID', 'Attendance', 'AwayTeamProbablePitcherID', 'HomeTeamProbablePitcherID', 'Outs', 'Balls', 'Strikes', 'CurrentPitcherID', 'CurrentHitterID', 'AwayTeamStartingPitcherID', 'HomeTeamStartingPitcherID', 'CurrentPitchingTeamID', 'CurrentHittingTeamID', 'PointSpread', 'OverUnder', 'AwayTeamMoneyLine', 'HomeTeamMoneyLine', 'ForecastTempLow', 'ForecastTempHigh', 'ForecastWindSpeed', 'RescheduledFromGameID', 'RunnerOnFirst', 'RunnerOnSecond', 'RunnerOnThird', 'GameID', 'Status', 'AwayTeam', 'HomeTeam', 'InningHalf', 'ForecastDescription', 'ForecastWindChill', 'ForecastWindDirection');
	
	protected $guarded = array('id');
}
