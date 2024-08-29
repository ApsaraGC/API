<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
  /**
     * @OA\Get(
     *     path="/patients",
     *     summary="Patient lists",
     *     description="Retrieve a list of patients. This endpoint may be restricted based on user roles.",
     *     tags={"Patients"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful retrieval of patient list",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=1),
     *                 @OA\Property(property="dob", type="string", format="date", example="2020-01-01"),
     *                 @OA\Property(property="image", type="string", example="patient_image.jpg"),
     *                 @OA\Property(property="gender", type="string", enum={"male", "female", "other"}, example="female"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-08-29T00:00:00Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-08-29T00:00:00Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *             @OA\Property(property="type", type="string", example="error")
     *         )
     *     )
     * )
     */


    public function index()
    {
        $user = Auth::user();
        $appointments = $user->patient->appointments()->with('doctor', 'department')->get();
        return response()->json($appointments);
    }
        public function dashboard()
    {
        $user = Auth::user();

        $appointments = Appointment::with('doctor', 'department')->get();
        $notifications = $user->notifications()->latest()->get();

        return response()->json([
            'appointments' => $appointments,
            'notifications' => $notifications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $departments = Department::all();

        return response()->json([
            'doctors' => $doctors,
            'departments' => $departments
        ]);
    }

    /**
     * @OA\Post(
     *     path="/patient",
     *     summary="Create a new patient record",
     *     tags={"Patients"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"address", "number", "age", "birth_date", "gender"},
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="number", type="string"),
     *             @OA\Property(property="age", type="integer"),
     *             @OA\Property(property="birth_date", type="string", format="date"),
     *             @OA\Property(property="gender", type="string", enum={"male", "female", "others"}),
     *             @OA\Property(property="description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Patient created successfully",
     *         @OA\JsonContent(@OA\Property(property="message", type="string"))
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:100',
            'number' => 'required|string',
            'age' => 'required|integer',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,others',
            'description' => 'nullable|string'
        ]);

        Patient::create([
            'user_id' => Auth::user()->id,
            'address' => $request->address,
            'number' => $request->number,
            'age' => $request->age,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Patient created successfully.'], 201);
    }


    public function show($id)
    {
        $appointment = Appointment::with('doctor', 'department')->findOrFail($id);


        return response()->json($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     */
     /**
     * @OA\Get(
     *     path="/patients/{id}/edit",
     *     summary="Edit patient details",
     *     description="Retrieve patient details for editing.",
     *     tags={"Patients"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful retrieval of patient details",
     *         @OA\JsonContent(ref="#/components/schemas/Patient")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Patient not found"
     *     )
     * )
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);
    }

    /**
     * Update the specified resource in storage.
     */
/**
     * @OA\Put(
     *     path="/patients/{id}",
     *     summary="Update patient details",
     *     description="Update the details of a specific patient by ID.",
     *     tags={"Patients"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"address", "number", "age", "birth_date", "gender"},
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="number", type="string"),
     *             @OA\Property(property="age", type="integer"),
     *             @OA\Property(property="birth_date", type="string", format="date"),
     *             @OA\Property(property="gender", type="string", enum={"male", "female", "others"}),
     *             @OA\Property(property="description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Patient details updated successfully",
     *         @OA\JsonContent(@OA\Property(property="message", type="string"))
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Patient not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required|string|max:100',
            'number' => 'required|numeric',
            'age' => 'required|integer',
            'birth_date' => 'required|date',
            'gender' => 'required|in:female,male,others',
            'description' => 'nullable|string'
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return response()->json(['message' => 'Patient updated successfully.']);
    }

    /**
     * @OA\Delete(
     *     path="/patients/{id}",
     *     summary="Delete a patient record",
     *     description="Delete a specific patient by ID.",
     *     tags={"Patients"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Patient deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Patient not found"
     *     )
     * )
     */
        public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->delete();
            return response()->json(['message' => 'Appointment canceled successfully!']);
        }

        return response()->json(['error' => 'Appointment not found.'], 404);
    }
 /**
     * @OA\Get(
     *     path="/patients/appointments",
     *     summary="Get all appointments for the authenticated patient",
     *     @OA\Response(
     *         response=200,
     *         description="List of appointments for the authenticated patient"
     *     )
     * )
     */
    public function appointments()
    {
        $patient = Auth::user()->patient;
        $appointments = $patient->appointments()->with('doctor', 'department')->get();

        return response()->json($appointments);
    }

    public function showAvailableSchedules()
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }
}
