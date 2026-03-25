@extends('layouts.dashboard')

@section('page-title', 'Clients / CRM')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">All Clients</h2>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Client
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                    <tr>
                        <td><strong>{{ $client->name }}</strong></td>
                        <td>{{ $client->company_name ?? '-' }}</td>
                        <td>{{ $client->email ?? '-' }}</td>
                        <td>{{ $client->mobile ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.clients.statement', $client) }}" class="btn btn-info btn-sm" title="Account Statement">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </a>
                                <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete client?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="empty-state">
                                <i class="fas fa-user-friends"></i>
                                <p>No clients found.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $clients->links() }}
    </div>
</div>
@endsection
