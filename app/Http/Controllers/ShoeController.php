<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoeController extends Controller
{
  /**
   * Display a listing of the resource.
   * 
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $sort = (!empty($sort_request = $request->get('sort'))) ?$sort_request : "updated_at";
    $order = (!empty($order_request = $request->get('order'))) ?$order_request : "DESC";
    $shoes = Shoe::orderBy($sort, $order)->paginate(10)->withQueryString();

    return view('admin.shoes.index', compact('shoes', 'sort', 'order'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.shoes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $this->validation($request->all());

    $shoe = new Shoe;
    $shoe->fill($data);

    $shoe->save();
    return redirect()->route('admin.shoes.show', $shoe);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Shoe  $shoe
   * @return \Illuminate\Http\Response
   */
  public function show(Shoe $shoe)
  {
    return view('admin.shoes.show', compact('shoe'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Shoe  $shoe
   * @return \Illuminate\Http\Response
   */
  public function edit(Shoe $shoe)
  {
    return view('admin.shoes.edit', compact('shoe'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Shoe  $shoe
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Shoe $shoe)
  {
    $data = $this->validation($request->all());

    $shoe->update($data);
    return redirect()->route('admin.shoes.show', $shoe);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Shoe  $shoe
   * @return \Illuminate\Http\Response
   */
  public function destroy(Shoe $shoe)
  {
    $shoe->delete();

    return to_route('admin.shoes.index');
  }

  private function validation($data)
  {
    $validator = Validator::make(

      $data,
      [
        'marca'  => 'required|string|max:50',
        'modello' => 'required|string|max:50',
        'colore' => 'required|string|max:50',
        'taglia' => 'required|numeric|between: 20 , 46',
        'prezzo' => 'required|numeric|between:0.00, 9999.99',
        'costo' => 'required|numeric|between:0.00, 9999.99',
        'genere' => 'required',
        'image' => 'required|string',
      ],
      [
        'marca.required' => 'il campo è richiesto',
        'modello.required' => 'il campo è richiesto',
        'colore.required' => 'il campo è richiesto',
        'taglia.required' => 'il campo è richiesto',
        'prezzo.required' => 'il campo è richiesto',
        'costo.required' => 'il campo è richiesto',
        'genere.required' => 'il campo è richiesto',
        'image.required' => 'il campo è richiesto',

        'taglia.string' => 'il campo deve essere una stringa',
        'prezzo.string' => 'il campo deve essere una stringa',
        'costo.string' => 'il campo deve essere una stringa',
        'genere.string' => 'il campo deve essere una stringa',
        'image.string' => 'il campo deve essere una stringa',

        'marca.max' => 'il campo deve avere massimo 50 caratteri',
        'modello.max' => 'il campo deve avere massimo 50 caratteri',
        'colore.max' => 'il campo deve avere massimo 50 caratteri',

        'taglia.numeric' => 'il campo deve essere un numero',
        'prezzo.numeric' => 'il campo deve essere un numero',
        'costo.numeric' => 'il campo deve essere un numero',
        'taglia.between' => 'la taglia deve essere compresa tra 20 e 46',
        'prezzo.between' => 'il prezzo deve essere compreso tra 0.00 e 9999.99',
        'costo.between' => 'il  costo deve essere compreso tra 0.00 e 9999.99',

      ]
    )->validate();
    return $validator;
  }
}