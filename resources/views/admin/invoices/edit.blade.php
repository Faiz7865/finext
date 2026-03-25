@extends('layouts.dashboard')

@section('page-title', 'Edit Invoice #' . $invoice->invoice_number)

@section('content')
<div class="container-fluid py-4">
    <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" enctype="multipart/form-data" id="invoiceForm">
        @csrf
        @method('PUT')
        
        <!-- Main Document Container -->
        <div class="card border-0 shadow-sm invoice-document mx-auto" style="max-width: 1100px; border-radius: 12px; background: #fff;">
            
            @if ($errors->any())
            <div class="alert alert-danger mx-5 mt-4 mb-0 border-0 shadow-sm rounded" style="background-color: #fef2f2; color: #991b1b;">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-exclamation-circle fa-lg mr-2"></i>
                    <h6 class="mb-0 font-weight-bold">Please fix the following errors to save the invoice:</h6>
                </div>
                <ul class="mb-0 pl-4 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Header Section -->
            <div class="card-body p-5 border-bottom border-light">
                <div class="row align-items-center mb-4">
                    <div class="col-md-6">
                        @if($invoice->logo_path)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $invoice->logo_path) }}" alt="Logo" style="max-height: 80px;" class="img-thumbnail bg-light mb-2">
                                <p class="small text-muted mb-0">Current Logo</p>
                            </div>
                        @endif
                        <div class="upload-branding bg-light rounded text-center p-4 border-dashed" style="border: 2px dashed #e2e8f0; cursor: pointer; transition: all 0.3s;">
                            <label class="form-label mb-2 text-primary font-weight-bold d-block">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-primary opacity-75"></i><br>
                                Change Company Logo
                            </label>
                            <input type="file" name="logo" class="form-control-file d-none" id="logoUpload" accept="image/*">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('logoUpload').click()">Browse Files</button>
                            <p class="small text-muted mt-2 mb-0" id="logoFileName">Max size: 2MB (240x120px)</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-right mt-4 mt-md-0">
                        <h1 class="display-5 font-weight-bold text-uppercase text-dark mb-0 tracking-tight">Edit Invoice</h1>
                        <p class="text-muted lead mb-0">Update document #{{ $invoice->invoice_number }}</p>
                    </div>
                </div>

                <!-- Invoice Meta Grid -->
                <div class="row bg-light rounded p-4 mx-0">
                    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
                        <label class="form-label text-muted small font-weight-bold text-uppercase mb-1">Invoice Number <span class="text-danger">*</span></label>
                        <input type="text" name="invoice_number" class="form-control border-0 shadow-sm" required placeholder="INV-0001" value="{{ old('invoice_number', $invoice->invoice_number) }}">
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
                        <label class="form-label text-muted small font-weight-bold text-uppercase mb-1">Invoice Date <span class="text-danger">*</span></label>
                        <input type="date" name="invoice_date" class="form-control border-0 shadow-sm" value="{{ old('invoice_date', $invoice->invoice_date->format('Y-m-d')) }}" required>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-3 mb-xl-0">
                        <label class="form-label text-muted small font-weight-bold text-uppercase mb-1">Due Date</label>
                        <input type="date" name="due_date" class="form-control border-0 shadow-sm" value="{{ old('due_date', $invoice->due_date ? $invoice->due_date->format('Y-m-d') : '') }}">
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <label class="form-label text-muted small font-weight-bold text-uppercase mb-1">Payment Terms</label>
                        <select name="payment_terms" class="form-control border-0 shadow-sm">
                            <option value="Due on Receipt" {{ old('payment_terms', $invoice->payment_terms) == 'Due on Receipt' ? 'selected' : '' }}>Due on Receipt</option>
                            <option value="Custom" {{ old('payment_terms', $invoice->payment_terms) == 'Custom' ? 'selected' : '' }}>Custom</option>
                            <option value="Net 15" {{ old('payment_terms', $invoice->payment_terms) == 'Net 15' ? 'selected' : '' }}>Net 15</option>
                            <option value="Net 30" {{ old('payment_terms', $invoice->payment_terms) == 'Net 30' ? 'selected' : '' }}>Net 30</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="card-body p-5 border-bottom border-light">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h6 class="text-uppercase font-weight-bold text-dark mb-3">From</h6>
                        <div class="form-group mb-3">
                            <textarea name="company_address" class="form-control form-control-flush bg-light p-3 border-0 rounded" rows="5" placeholder="Your Company Name, Address, Contact details...">{{ old('company_address', $invoice->company_address) }}</textarea>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="gstActive" name="gst_active" value="1" {{ old('gst_active', $invoice->gst_active) ? 'checked' : '' }}>
                            <label class="custom-control-label text-muted" for="gstActive">Include GST Details</label>
                        </div>
                        <div class="form-group mb-0" id="gstSection" style="{{ old('gst_active', $invoice->gst_active) ? 'display: block;' : 'display: none;' }}">
                            <input type="text" name="gst_number" id="gstNumber" class="form-control bg-light border-0 shadow-sm" placeholder="Enter GSTIN" value="{{ old('gst_number', $invoice->gst_number) }}">
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h6 class="text-uppercase font-weight-bold text-dark mb-3">Bill To</h6>
                        <div class="form-group mb-3">
                            <select name="client_id" id="clientSelect" class="form-control bg-light border-0 shadow-sm mb-2">
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $c)
                                    <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-company="{{ $c->company_name }}" data-address="{{ $c->address }}" {{ old('client_id', $invoice->client_id) == $c->id ? 'selected' : '' }}>{{ $c->name }} ({{ $c->company_name }})</option>
                                @endforeach
                            </select>
                            <input type="text" name="bill_to_name" id="billToName" class="form-control bg-light border-0 shadow-sm mb-2" required placeholder="Customer Name" value="{{ old('bill_to_name', $invoice->bill_to_name) }}">
                            <textarea name="bill_to_address" id="billToAddress" class="form-control form-control-flush bg-light p-3 border-0 rounded" rows="3" placeholder="Billing Address...">{{ old('bill_to_address', $invoice->bill_to_address) }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-uppercase font-weight-bold text-dark mb-0">Ship To</h6>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="shipToActive" name="ship_to_active" value="1" {{ old('ship_to_active', $invoice->ship_to_active) ? 'checked' : '' }}>
                                <label class="custom-control-label small text-muted" for="shipToActive">Same as Bill To</label>
                            </div>
                        </div>
                        <div id="shippingSection" style="{{ old('ship_to_active', $invoice->ship_to_active) ? 'opacity: 0.5;' : '' }}">
                            <div class="form-group mb-3">
                                <input type="text" name="ship_to_name" class="form-control bg-light border-0 shadow-sm mb-2" placeholder="Recipient Name" value="{{ old('ship_to_name', $invoice->ship_to_name) }}" {{ old('ship_to_active', $invoice->ship_to_active) ? 'readonly' : '' }}>
                                <textarea name="ship_to_address" class="form-control form-control-flush bg-light p-3 border-0 rounded" rows="3" placeholder="Shipping Address..." {{ old('ship_to_active', $invoice->ship_to_active) ? 'readonly' : '' }}>{{ old('ship_to_address', $invoice->ship_to_address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Section -->
            <div class="card-body p-0 border-bottom border-light">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover mb-0" id="itemsTable">
                        <thead class="bg-light text-muted small text-uppercase font-weight-bold">
                            <tr>
                                <th class="pl-5 py-3" style="width: 45%; min-width: 250px;">Item details</th>
                                <th class="py-3" style="width: 15%; min-width: 100px;">HSN/SAC</th>
                                <th class="py-3 text-right" style="width: 10%; min-width: 80px;">Qty</th>
                                <th class="py-3 text-right" style="width: 12%; min-width: 100px;">Rate</th>
                                <th class="py-3 text-right" style="width: 13%; min-width: 100px;">Amount</th>
                                <th class="pr-5 py-3" style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody class="border-bottom">
                            @php
                                $itemsData = old('items', $invoice->items->toArray());
                            @endphp
                            @foreach($itemsData as $index => $item)
                            <tr class="item-row">
                                <td class="pl-5 py-4">
                                    <select class="form-control border-light mb-2 item-select">
                                        <option value="">-- Select Item (Optional) --</option>
                                        @foreach($items as $it)
                                            <option value="{{ $it->id }}" data-desc="{{ $it->description }}" data-hsn="{{ $it->hsn_sac_code }}" data-price="{{ $it->default_price }}">{{ $it->name }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="items[{{ $index }}][description]" class="form-control border-light item-desc" rows="2" required placeholder="Description of service or product...">{{ $item['name'] ?? $item['description'] ?? '' }}</textarea>
                                </td>
                                <td class="py-4 align-top">
                                    <input type="text" name="items[{{ $index }}][hsn_sac_code]" class="form-control border-light text-center item-hsn" placeholder="Code" value="{{ $item['hsn_sac_code'] ?? '' }}">
                                </td>
                                <td class="py-4 align-top">
                                    <input type="number" name="items[{{ $index }}][quantity]" class="form-control border-light qty text-center" step="0.01" value="{{ $item['quantity'] ?? '1.00' }}" required>
                                </td>
                                <td class="py-4 align-top">
                                    <input type="number" name="items[{{ $index }}][rate]" class="form-control border-light rate text-right" step="0.01" value="{{ $item['rate'] ?? '0.00' }}" required>
                                </td>
                                <td class="py-4 align-top">
                                    <input type="number" name="items[{{ $index }}][amount]" class="form-control-plaintext amount text-right font-weight-bold mt-1" readonly value="{{ $item['amount'] ?? '0.00' }}">
                                </td>
                                <td class="pr-5 py-4 align-top text-right">
                                    @if($index > 0)
                                    <button type="button" class="btn btn-link text-danger remove-row mt-1 p-0"><i class="fas fa-times-circle fa-lg"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 pl-5">
                    <button type="button" class="btn btn-outline-primary rounded-pill px-4" id="addItem">
                        <i class="fas fa-plus mr-2"></i> Add Another Line
                    </button>
                </div>
            </div>

            <!-- Footer & Totals Section -->
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-lg-7 pr-lg-5 mb-5 mb-lg-0">
                        <div class="mb-4">
                            <label class="form-label font-weight-bold text-dark mb-2">Total In Words</label>
                            <input type="text" name="total_in_words" class="form-control border-light bg-light font-italic shadow-sm" placeholder="Indian Rupee .... Only" value="{{ old('total_in_words', $invoice->total_in_words) }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-weight-bold text-dark mb-2">Customer Notes</label>
                            <textarea name="notes" class="form-control border-light bg-light shadow-sm" rows="3">{{ old('notes', $invoice->notes) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-weight-bold text-dark mb-2">Terms & Conditions</label>
                            <textarea name="terms_conditions" class="form-control border-light bg-light shadow-sm" rows="4">{{ old('terms_conditions', $invoice->terms_conditions) }}</textarea>
                        </div>

                        <!-- Payment Info & Signature -->
                        <div class="bg-light rounded p-4 mt-4 shadow-sm border border-light">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h6 class="font-weight-bold text-dark mb-3">Payment Details</h6>
                                    <select name="payment_method" class="form-control border-white shadow-sm mb-3">
                                        <option value="">Select Method</option>
                                        <option value="UPI" {{ old('payment_method', $invoice->payment_method) == 'UPI' ? 'selected' : '' }}>UPI</option>
                                        <option value="NEFT" {{ old('payment_method', $invoice->payment_method) == 'NEFT' ? 'selected' : '' }}>NEFT</option>
                                        <option value="Net Banking" {{ old('payment_method', $invoice->payment_method) == 'Net Banking' ? 'selected' : '' }}>Net Banking</option>
                                    </select>
                                    <input type="text" name="transaction_id" class="form-control border-white shadow-sm" placeholder="Transaction ID" value="{{ old('transaction_id', $invoice->transaction_id) }}">
                                </div>
                                <div class="col-md-6 border-left-md pl-md-4">
                                    <h6 class="font-weight-bold text-dark mb-3">Upload Signature</h6>
                                    @if($invoice->signature_path)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $invoice->signature_path) }}" alt="Signature" style="max-height: 50px;" class="img-thumbnail bg-white">
                                        </div>
                                    @endif
                                    <div class="upload-branding bg-white rounded text-center p-3 border-dashed" style="border: 2px dashed #cbd5e0; cursor: pointer;">
                                        <input type="file" name="signature" class="form-control-file d-none" id="signatureUpload" accept="image/*">
                                        <button type="button" class="btn btn-sm btn-light border w-100 mb-2" onclick="document.getElementById('signatureUpload').click()">{{ $invoice->signature_path ? 'Change Signature' : 'Choose File' }}</button>
                                        <small class="text-muted d-block" id="sigFileName">No file chosen (PNG transparent)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="bg-light rounded p-4 h-100 border border-light shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted font-weight-bold">Subtotal</span>
                                <span id="subtotalLabel" class="h6 mb-0 font-weight-bold text-dark">₹0.00</span>
                                <input type="hidden" name="subtotal" id="subtotalInput" value="{{ $invoice->subtotal }}">
                            </div>

                            <div class="text-right mb-2" id="addDiscountBtnContainer" style="{{ $invoice->discount_amount > 0 ? 'display: none;' : 'display: block;' }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" id="showDiscountField">
                                    <i class="fas fa-plus mr-1"></i> Add Discount
                                </button>
                            </div>

                            <div id="discountContainer" class="mb-3" style="{{ $invoice->discount_amount > 0 ? 'display: block;' : 'display: none;' }}">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-sm text-danger p-0 mr-2" id="removeDiscount" title="Remove Discount"><i class="fas fa-times-circle"></i></button>
                                        <span class="text-muted font-weight-bold">Discount (₹)</span>
                                    </div>
                                    <input type="number" name="discount_amount" id="discountAmountInput" class="form-control form-control-sm text-right font-weight-bold border shadow-sm" style="width: 100px;" value="{{ old('discount_amount', $invoice->discount_amount ?: 0) }}" step="0.01">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom border-secondary">
                                <span class="text-dark font-weight-bold text-uppercase small">Taxable Amount</span>
                                <span id="taxableAmountLabel" class="font-weight-bold text-dark">₹0.00</span>
                                <input type="hidden" name="taxable_amount" id="taxableAmountInput" value="{{ $invoice->taxable_amount }}">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted font-weight-bold d-flex align-items-center">
                                    SGST 
                                    <input type="number" name="sgst_rate" id="sgstPercentage" class="form-control form-control-sm text-center ml-2 border shadow-sm" style="width: 60px; height: 30px;" value="{{ old('sgst_rate', $invoice->sgst_rate ?: 9) }}" step="0.01">
                                    <span class="ml-1">%</span>
                                </span>
                                <span id="sgstAmountLabel" class="font-weight-bold text-dark">₹0.00</span>
                                <input type="hidden" name="sgst_amount" id="sgstAmountInput" value="{{ $invoice->sgst_amount }}">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-light">
                                <span class="text-muted font-weight-bold d-flex align-items-center">
                                    CGST 
                                    <input type="number" name="cgst_rate" id="cgstPercentage" class="form-control form-control-sm text-center ml-2 border shadow-sm" style="width: 60px; height: 30px;" value="{{ old('cgst_rate', $invoice->cgst_rate ?: 9) }}" step="0.01">
                                    <span class="ml-1">%</span>
                                </span>
                                <span id="cgstAmountLabel" class="font-weight-bold text-dark">₹0.00</span>
                                <input type="hidden" name="cgst_amount" id="cgstAmountInput" value="{{ $invoice->cgst_amount }}">
                            </div>

                            <div class="bg-primary text-white rounded p-3 mb-4 shadow-sm">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="font-weight-bold text-uppercase small">Payable Amount</span>
                                    <h4 id="totalLabel" class="mb-0 font-weight-bold">₹0.00</h4>
                                    <input type="hidden" name="total" id="totalInput" value="{{ $invoice->total }}">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="font-weight-bold text-muted small text-uppercase">Payment Made (₹)</span>
                                <input type="number" name="amount_paid" class="form-control form-control-sm text-right border shadow-sm" style="width: 120px;" id="paidInput" value="{{ old('amount_paid', $invoice->amount_paid) }}" step="0.01">
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top border-light">
                                <span class="font-weight-bold text-danger small text-uppercase">Balance Due</span>
                                <h5 id="balanceLabel" class="text-danger mb-0 font-weight-bold">₹0.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 pt-4 border-top border-light text-right">
                    <a href="{{ route('admin.invoices.index') }}" class="btn btn-white btn-lg px-4 mr-3 shadow-sm border text-muted">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow font-weight-bold">
                        <i class="fas fa-save mr-2"></i> Update Invoice
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .invoice-document { transition: all 0.3s ease; }
    .invoice-document .form-control { border-radius: 6px; }
    .invoice-document .form-control-flush { background-color: transparent !important; resize: none; }
    .upload-branding:hover { border-color: #4f46e5 !important; background-color: #f8fafc !important; }
    @media (min-width: 768px) { .border-left-md { border-left: 1px solid #e2e8f0; } }
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let rowCount = {{ count($itemsData) }};
    const table = document.getElementById('itemsTable').getElementsByTagName('tbody')[0];
    const addItemBtn = document.getElementById('addItem');
    
    document.getElementById('logoUpload').addEventListener('change', function(e) {
        if(e.target.files.length > 0) document.getElementById('logoFileName').innerText = e.target.files[0].name;
    });
    document.getElementById('signatureUpload').addEventListener('change', function(e) {
        if(e.target.files.length > 0) document.getElementById('sigFileName').innerText = e.target.files[0].name;
    });

    addItemBtn.addEventListener('click', function() {
        const newRow = table.insertRow();
        newRow.className = 'item-row';
        newRow.innerHTML = `
            <td class="pl-5 py-4">
                <select class="form-control border-light mb-2 item-select">
                    <option value="">-- Select Item (Optional) --</option>
                    @foreach($items as $it)
                        <option value="{{ $it->id }}" data-desc="{{ $it->description }}" data-hsn="{{ $it->hsn_sac_code }}" data-price="{{ $it->default_price }}">{{ $it->name }}</option>
                    @endforeach
                </select>
                <textarea name="items[${rowCount}][description]" class="form-control border-light item-desc" rows="2" required placeholder="Description..."></textarea>
            </td>
            <td class="py-4 align-top">
                <input type="text" name="items[${rowCount}][hsn_sac_code]" class="form-control border-light text-center" placeholder="Code">
            </td>
            <td class="py-4 align-top">
                <input type="number" name="items[${rowCount}][quantity]" class="form-control border-light qty text-center" step="0.01" value="1.00" required>
            </td>
            <td class="py-4 align-top">
                <input type="number" name="items[${rowCount}][rate]" class="form-control border-light rate text-right" step="0.01" value="0.00" required>
            </td>
            <td class="py-4 align-top">
                <input type="number" name="items[${rowCount}][amount]" class="form-control-plaintext amount text-right font-weight-bold mt-1" readonly value="0.00">
            </td>
            <td class="pr-5 py-4 align-top text-right">
                <button type="button" class="btn btn-link text-danger remove-row mt-1 p-0"><i class="fas fa-times-circle fa-lg"></i></button>
            </td>
        `;
        rowCount++;
        attachListeners(newRow);
    });

    table.addEventListener('click', function(e) {
        if (e.target.closest('.remove-row')) {
            e.target.closest('tr').remove();
            calculateTotals();
        }
    });

    document.getElementById('showDiscountField').addEventListener('click', function() {
        document.getElementById('discountContainer').style.display = 'block';
        document.getElementById('addDiscountBtnContainer').style.display = 'none';
        calculateTotals();
    });

    document.getElementById('removeDiscount').addEventListener('click', function() {
        document.getElementById('discountAmountInput').value = 0;
        document.getElementById('discountContainer').style.display = 'none';
        document.getElementById('addDiscountBtnContainer').style.display = 'block';
        calculateTotals();
    });

    function attachListeners(row) {
        row.querySelectorAll('input.qty, input.rate').forEach(input => {
            input.addEventListener('input', function() {
                const qty = parseFloat(row.querySelector('.qty').value) || 0;
                const rate = parseFloat(row.querySelector('.rate').value) || 0;
                const amount = qty * rate;
                row.querySelector('.amount').value = amount.toFixed(2);
                calculateTotals();
            });
        });

        const selectItem = row.querySelector('.item-select');
        if (selectItem) {
            selectItem.addEventListener('change', function() {
                const opt = this.options[this.selectedIndex];
                if (opt.value) {
                    const desc = opt.getAttribute('data-desc');
                    const hsn = opt.getAttribute('data-hsn');
                    const price = parseFloat(opt.getAttribute('data-price')) || 0;
                    row.querySelector('.item-desc').value = opt.text + (desc ? "\n" + desc.replace(/\\n/g, '\n') : "");
                    row.querySelector('.item-hsn').value = hsn || '';
                    row.querySelector('.rate').value = price.toFixed(2);
                    row.querySelector('.rate').dispatchEvent(new Event('input'));
                }
            });
        }
    }

    function calculateTotals() {
        let subtotal = 0;
        document.querySelectorAll('.amount').forEach(input => { subtotal += parseFloat(input.value) || 0; });
        const discountAmount = parseFloat(document.getElementById('discountAmountInput').value) || 0;
        const taxableAmount = Math.max(0, subtotal - discountAmount);
        const sgstPercentage = parseFloat(document.getElementById('sgstPercentage').value) || 0;
        const sgstAmount = taxableAmount * (sgstPercentage / 100);
        const cgstPercentage = parseFloat(document.getElementById('cgstPercentage').value) || 0;
        const cgstAmount = taxableAmount * (cgstPercentage / 100);
        const total = taxableAmount + sgstAmount + cgstAmount;
        const paid = parseFloat(document.getElementById('paidInput').value) || 0;
        const balance = total - paid;

        const fmt = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' });
        document.getElementById('subtotalLabel').textContent = fmt.format(subtotal);
        document.getElementById('taxableAmountLabel').textContent = fmt.format(taxableAmount);
        document.getElementById('sgstAmountLabel').textContent = fmt.format(sgstAmount);
        document.getElementById('cgstAmountLabel').textContent = fmt.format(cgstAmount);
        document.getElementById('totalLabel').textContent = fmt.format(total);
        document.getElementById('balanceLabel').textContent = fmt.format(balance);

        document.getElementById('subtotalInput').value = subtotal.toFixed(2);
        document.getElementById('taxableAmountInput').value = taxableAmount.toFixed(2);
        document.getElementById('sgstAmountInput').value = sgstAmount.toFixed(2);
        document.getElementById('cgstAmountInput').value = cgstAmount.toFixed(2);
        document.getElementById('totalInput').value = total.toFixed(2);
    }

    document.getElementById('paidInput').addEventListener('input', calculateTotals);
    document.getElementById('discountAmountInput').addEventListener('input', calculateTotals);
    document.getElementById('sgstPercentage').addEventListener('input', calculateTotals);
    document.getElementById('cgstPercentage').addEventListener('input', calculateTotals);
    document.querySelectorAll('.item-row').forEach(attachListeners);
    calculateTotals();

    document.getElementById('shipToActive').addEventListener('change', function() {
        const section = document.getElementById('shippingSection');
        if (this.checked) {
            section.style.opacity = '0.5';
            section.querySelectorAll('input, textarea').forEach(el => el.readOnly = true);
        } else {
            section.style.opacity = '1';
            section.querySelectorAll('input, textarea').forEach(el => el.readOnly = false);
        }
    });

    const gstActive = document.getElementById('gstActive');
    gstActive.addEventListener('change', function() {
        const section = document.getElementById('gstSection');
        if (this.checked) { section.style.display = 'block'; } else { section.style.display = 'none'; }
    });

    const clientSelect = document.getElementById('clientSelect');
    if (clientSelect) {
        clientSelect.addEventListener('change', function() {
            const opt = this.options[this.selectedIndex];
            if (opt.value) {
                document.getElementById('billToName').value = opt.getAttribute('data-name') + (opt.getAttribute('data-company') ? " (" + opt.getAttribute('data-company') + ")" : "");
                document.getElementById('billToAddress').value = opt.getAttribute('data-address') || '';
            }
        });
    }
});
</script>
@endpush
@endsection
