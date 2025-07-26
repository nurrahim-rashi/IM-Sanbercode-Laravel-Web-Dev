use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

public function boot(): void
{
    parent::boot();
    Route::aliasMiddleware('role', RoleMiddleware::class);
}
