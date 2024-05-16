use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('images');
                $table->foreignId('travel_package_id')->constrained();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
