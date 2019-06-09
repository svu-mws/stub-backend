<?php


namespace App\Presenters;


use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function flatten()
    {
        $user = collect($this);
        $user = $user->filter(function ($k, $v) {
            return $k === 'id' || strpos($k, 'id') === false;
        });
        return $user->merge([
            'education_level' => $this->educationLevel->level,
            'possession_type' => $this->possessionType->type,
            'internet_connection_type' => $this->internetConnectionType->type,
            'marital_status' => $this->martialStatus->status,
            'movie_selector' => $this->movieSelector->selector,
            'conveyor_format' => $this->conveyorFormat->format,
            'tv_signal_type' => $this->tvSignalType->type,
            'ppv_frequency' => $this->PPVFrequency->frequency,
            'buying_frequency' => $this->buyingFrequency->frequency,
            'renting_frequency' => $this->rentingFrequency->frequency,
            'viewing_frequency' => $this->viewingFrequency->frequency,
            'theatre_frequency' => $this->theatreFrequency->frequency,
            'tv_movie_frequency' => $this->tvMovieFrequency->frequency,
        ]);
    }
}
