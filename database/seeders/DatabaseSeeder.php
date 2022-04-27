<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\{Clinic, User, Patient, VitalSign, Consultation, Exam, Prescription, Document, Allergy, MedicalAppointment, Habit, Payment, MedicalBackground, CashRegister, Team};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
            \DB::table('clinics')->truncate();
            \DB::table('users')->truncate();
            \DB::table('patients')->truncate();
            \DB::table('consultations')->truncate();
            \DB::table('vital_signs')->truncate();
            \DB::table('exams')->truncate();
            \DB::table('prescriptions')->truncate();
            \DB::table('documents')->truncate();
            \DB::table('allergies')->truncate();
            \DB::table('medical_appointments')->truncate();
            \DB::table('habits')->truncate();
            \DB::table('payments')->truncate();
            \DB::table('medical_backgrounds')->truncate();
            \DB::table('cash_registers')->truncate();
            //\DB::table('teams')->truncate();
           
        Schema::enableForeignKeyConstraints();
         //create a register for clinics
        $clinic = Clinic::factory()
            ->has(CashRegister::factory(10))
            ->create();
        
        //create users related with a clinic
        $user = User::factory()
            ->count(4)
            ->for($clinic)
            //->has(Team::factory())
            ->create();
        //create patients and consultations, each consultarion record is join whith a patient register    
        $patient = Patient::factory()
            ->count(8)
            ->for($clinic)
            ->has(Allergy::factory())
            ->has(MedicalAppointment::factory())
            ->has(Habit::factory())
            ->has(Payment::factory())
            ->has(MedicalBackground::factory())
            ->create(); 

        // Storage::deleteDirectory('public/images');
        // Storage::makeDirectory('public/images');
       
        $consultation = Consultation::factory()
            ->count(8)
            ->has(VitalSign::factory())
            ->has(Exam::factory())
            ->has(Prescription::factory())
            ->has(Document::factory())
            ->create();



        //$document = Document::factory(8)->create(); 
        //$exam = Exam::factory(8)->create(); 
   }
}
