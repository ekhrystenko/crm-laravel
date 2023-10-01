<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CrudRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

/**
 * Class AbstractController
 * @package App\Http\Controllers\Admin
 */
abstract class AbstractController extends Controller
{
    /**
     * AbstractController constructor.
     * @param CrudRepositoryInterface $repository
     */
    public function __construct(protected CrudRepositoryInterface $repository)
    {
    }

    /**
     * @return mixed
     */
    abstract protected function getEntityName(): string;

    /**
     * @return Model
     */
    abstract protected function getModelName(): Model;

    /**
     * @return RedirectResponse
     */
    protected function redirectToIndex(): RedirectResponse
    {
        return redirect()->route($this->getEntityName() . '.index');
    }
}
