<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class CompaniesController
 * @package App\Http\Controllers\Admin
 */
class CompaniesController extends AbstractController
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $companies = $this->repository->all(model: $this->getModelName(), paginate: true);
        return view('layouts.admin.companies.index', compact('companies'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('layouts.admin.companies.add');
    }

    /**
     * @param CompanyRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyRequest $request): RedirectResponse
    {
        $company = $this->repository->create($this->getModelName(), $request->validated());
        return $this->redirectToIndex()->with('success', 'Company ' . $company->name . ' created!');
    }

    /**
     * @param Company $company
     * @return Application|Factory|View
     */
    public function show(Company $company): Application|Factory|View
    {
        return view('layouts.admin.companies.show', compact('company'));
    }

    /**
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company): Application|Factory|View
    {
        return view('layouts.admin.companies.edit', compact('company'));
    }

    /**
     * @param CompanyRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $company = $this->repository->update($company, $request->validated());
        return $this->redirectToIndex()->with('update', 'Company ' . $company->name . ' updated!');
    }

    /**
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->repository->delete(model: $company, relation: 'clients');
        return $this->redirectToIndex()->with('delete', 'Company ' . $company->name . ' deleted!');
    }

    /**
     * @return Company
     */
    protected function getModelName(): Company
    {
        return app(Company::class);
    }

    /**
     * @return Company
     */
    protected function getEntityName(): string
    {
        return 'companies';
    }

}
