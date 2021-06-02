use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'eigyo/index';

    public function __construct(Request $request)
    {
        $this->middleware('guest:eigyo')->except('logout');;
    }

    protected function guard()
    {
        return Auth::guard('eigyo');
    }

}
