# Repository Pattern
```php
<?php
namespace App\Repository\Contract;

interface IBase
{
    public function all();
    public function show($id);
    public function store();
    public function destroy($id);
}
```
And our Repository Eloquent could be :

```php
<?php

namespace App\Repository\Eloquent;

use Exception;

abstract class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    protected function getModelClass()
    {
        if(!method_exists($this, 'model')){
            throw new Exception('model not defiend !');
        }

        return app()->make($this->model());
    }
}
```

So The repository post also will look like:
```php
<?php

namespace App\Repository\Eloquent;
use App\Repository\Contract\IPost;
use App\Repository\Eloquent\BaseRepository;
use App\Post;

class PostRepository  extends BaseRepository implements IPost
{
    public function model()
    {
        return Post::class;
    }

}

```

Then we use it in our controller like so:
```php
<?php

namespace App\Http\Controllers;

use App\Repository\Contract\IPost;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(IPost $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return $this->postRepository->all();
    }

    public function show($id)
    {
        return $this->postRepository->show($id);
    }
}
```
And you should create provider to handle repository pattern:
```php
<?php

namespace App\Providers;

use App\Repository\Eloquent\PostRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Contract\IPost;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IPost::class, PostRepository::class);
    }
}

```

And Our routes will look like:
```php
Route::get('posts', 'PostController@index');
Route::get('posts/{id}', 'PostController@show');

```

I wih someone to find for me this tutroail on Udemy it's explain the repository pattern with laravel so If you need to konw more about a tutoral follow this [link](https://www.udemy.com/course/fullstack-laravel-api-and-nuxt-development/?ranMID=39197&ranEAID=DeOa1j5TvBE&ranSiteID=DeOa1j5TvBE-.KaBGzR8DJu_AdM4LEwe7A&LSNPUBID=DeOa1j5TvBE)
