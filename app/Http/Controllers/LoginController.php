<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Hash;
use Auth;

use App\Models\Usuario;

class LoginController extends Controller
{

    public function registrar(){
    	return view('registrar');
    }


	public function create(Request $request){

        $datos = $request->all();

        //$correo = $request->input("email");
        //Aqui le concatenamos el @misena.edu.co a lo que ingreso el usuario 

        $datos['email']=$datos['email']."@misena.edu.co";

        // echo "<pre>";
        // print_r($datos);

        // obtener la fecha de hoy hace 15 años y pasarla a la validacion del cmapo fecha

        $reglas = [
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];

        $result = Validator::make($datos, $reglas);

        if ($result->fails()) {
            //con esta linea retornamos los datos  buenos que el usuario ingreso 
        return back()->withInput($request->all());

//return redirect()->action('register')->withInput();

        }else{

            $datos['password'] = Hash::make($datos['password']);

            Usuario::create($datos);

            return redirect ('login')->with('message','Usuario Creado!');;
        }
    }


    public function check(Request $request){

    	$datos = $request->only('email', 'password');

        $datos['email']=$datos['email']."@misena.edu.co";
        
    	if ( Auth::attempt($datos) ) {
            
            return redirect()->intended('mesas');
        }else{
            
            return redirect('login')->with('message', 'Fallo el ingreso!')->withInput();
        }
    }

    //para cerrar sesion
    public function logout(){
    	Auth::logout();
  		return redirect('/');
    }

    public function home(){
    //     echo "<meta http-equiv='Expires' content='0'/>
    // <meta http-equiv='Pragma' content='no-cache'/>
    // <script type='text/javascript'>
    //     if (history.forward(1)) {
    //         location.replace(history.forward(1));
    //     }
    // </script>";
        //return view ('mesas/ver');
        //return redirect()->intended('mesas');
    }
}

