<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Repositories\ParticipantRepository;
use Inertia\Inertia;
use Inertia\Response;

class ParticipantController
{
    public function index(): Response
    {
        return Inertia::render('Participant/ParticipantIndex', [
            'participants' => ParticipantRepository::list(),
            'participantCount' => ParticipantRepository::count(),
        ]);
    }

    public function show(Participant $participant): Response
    {
        return Inertia::render('Participant/ParticipantShow', [
            'participant' => $participant->load('activities')
        ]);
    }
}