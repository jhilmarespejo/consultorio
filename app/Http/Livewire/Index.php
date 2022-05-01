<?php

namespace App\Http\Livewire;

use Livewire\{Component, WithFileUploads, WithPagination};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Consultation, Patient, MedicalAppointment, CashRegister, Payment};


class Index extends Component
{
    public function render()
    {
        //Total de pacientes
        //Citas para hoy y otras citas 2022-04-05 date("Y-m-d")
        //Total consultas realizadas hoy consultations
        //Caja
        //--------------------//
        // estadisticas por sexo
        // consultas por dia
        // total de creditos (deudas)

        
        $patientsTotal = Patient::count();
        $appointmentsToday = MedicalAppointment::
                                    where('date', today())
                                    ->count();

        $consultationsToday = Consultation::
                                whereDate('created_at', '=', '2022-04-05')
                                ->count();


        // $cashStartDate = Carbon::createFromFormat('Y-m-d', '2022-04-03');
        // $cashEndDate = Carbon::createFromFormat('Y-m-d', '2022-04-05');

        $dateCash = CashRegister::select('date')->get();
        $creditTotal = CashRegister::
                        whereBetween('date', [$dateCash->min()->date, $dateCash->max()->date])
                        ->sum('credit');
        $expensesTotal = CashRegister::
                        whereBetween('date', [$dateCash->min()->date, $dateCash->max()->date])
                        ->sum('expenses');



       $datePayment = Payment::select('date')->get();
       $creditPatientsTotal = Payment::
                        whereBetween('date', [$datePayment->min()->date, $datePayment->max()->date])
                        ->sum('credit');


                        //->dd();
// Aeronave::join('usuarios', 'usuarios.id', '=', 'aeronaves.id_users')
// ->where('usuarios.nombre', 'like', "%{$query}%")
// ->orWhere('usuarios.apellido', 'like', "%{$query}%")
// ->orWhere(Condicionales originales)
//->get();

// SELECT sex, patient_id FROM patients
// JOIN consultations on consultations.patient_id = patients.id
// where consultations.created_at LIKE '2022-04-07%';

        $sexStats = Patient::select('sex')
                    ->join('consultations', 'consultations.patient_id', 'patients.id')
                    ->where('consultations.created_at', 'like', '2022-04-07%')
                    ->get();
        $collection = collect($sexStats);
        $sexCount = $sexStats->countBy(function ($item) {
            return $item['sex'];
        });

        return view('livewire.index', ['patientsTotal' => $patientsTotal, 'appointmentsToday' => $appointmentsToday, 'consultationsToday' => $consultationsToday, 'creditTotal' => $creditTotal, 'expensesTotal' => $expensesTotal, 'creditPatientsTotal' => $creditPatientsTotal, 'sexStats' => $sexCount]);
    }
}
