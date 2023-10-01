<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientsController extends AbstractController
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $clients = $this->repository->all(model: $this->getModelName(), paginate: true);
        return view('layouts.admin.clients.index', compact('clients'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $companies = $this->repository->all(model: app(Company::class));
        return view('layouts.admin.clients.add', compact('companies'));
    }

    /**
     * @param ClientRequest $request
     * @return RedirectResponse
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        $selectedCompanies = $request->input('companies', []);
        $client = $this->repository->create($this->getModelName(), $request->validated(), $selectedCompanies, 'companies');

        return $this->redirectToIndex()->with('success', 'Client ' . $client->name . ' created!');
    }

    /**
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client): Application|Factory|View
    {
        return view('layouts.admin.clients.show', compact('client'));
    }

    /**
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client): Application|Factory|View
    {
        $companies = $this->repository->all(model: app(Company::class), paginate: false);
        $selectedCompanies = $client->companies->pluck('id')->toArray();
        return view('layouts.admin.clients.edit', compact('client', 'companies', 'selectedCompanies'));
    }

    /**
     * @param ClientRequest $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $selectedCompanies = $request->input('companies', []);
        $client = $this->repository->update($client, $request->validated(), $selectedCompanies, 'companies');

        return $this->redirectToIndex()->with('update', 'Client ' . $client->name . ' updated!');
    }

    /**
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        $this->repository->delete(model: $client, relation: 'companies');
        return $this->redirectToIndex()->with('delete', 'Client ' . $client->name . ' deleted!');
    }

    /**
     * @return Client
     */
    protected function getModelName(): Client
    {
        return app(Client::class);
    }

    /**
     * @return Client
     */
    protected function getEntityName(): string
    {
        return 'clients';
    }
}
