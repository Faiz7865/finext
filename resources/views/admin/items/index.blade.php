@extends('layouts.dashboard')

@section('page-title', 'Items / Inventory')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Inventory Items</h2>
        <a href="{{ route('admin.items.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Item
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>HSN/SAC Code</th>
                    <th>Default Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td style="white-space: normal; max-width: 300px;" title="{{ $item->description }}">
                            {{ Str::limit($item->description, 60, '...') }}
                        </td>
                        <td>{{ $item->hsn_sac_code ?? '-' }}</td>
                        <td class="text-success font-weight-bold">₹ {{ number_format($item->default_price, 2) }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete item?');">
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
                                <i class="fas fa-box-open"></i>
                                <p>No items found.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $items->links() }}
    </div>
</div>
@endsection
