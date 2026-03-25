<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $invoice->invoice_number }}</title>
    <style>
        @page {
            margin: 0;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9px;
            color: #333;
            line-height: 1.3;
            margin: 0;
            padding: 15px;
        }

        * {
            box-sizing: border-box;
        }

        .main-border {
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header-table{
             border-left: 1px solid #999;
             border-right: 1px solid #999;
             border-top: 1px solid #999;
        }
         .header-table td {
            padding: 3px 10px;
            /* font-size: 10px; */
        }

        .company-info-cell {
            width: 50%;
        }

        .company-name {
            font-size: 16px;
            font-weight: bold;
            color: #000;
            margin-bottom: 2px;
        }

        .company-details {
            color: #4b5563;
            line-height: 1.5;
        }

        .tax-invoice-cell {
            width: 50%;
            text-align: right;
            vertical-align: middle;
        }

        .tax-invoice-title {
            font-size: 24px;
            font-weight: normal;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Meta Section with border */
        .meta-section {
            border: 1px solid #999;
        }

        .meta-table td {
            padding: 2px 8px;
            font-size: 9px;
        }

        .meta-label {
            color: #4b5563;
            width: 100px;
        }

        .meta-value {
            font-weight: bold;
            color: #000;
        }

        /* Address Section with borders */
        .address-section {
            margin-top: 0;
            border-left: 1px solid #999;
            border-right: 1px solid #999;
            border-bottom: 1px solid #999;
        }

        .address-table td {
            width: 50%;
            padding: 0;
            vertical-align: top;
        }

        .bill-to-cell {
            border-right: 1px solid #999;
        }

        .address-header {
            background-color: #f3f4f6;
            padding: 4px 8px;
            font-weight: bold;
            color: #000;
            font-size: 9px;
            border-bottom: 1px solid #999;
        }

        .address-content {
            padding: 6px 8px;
            line-height: 1.3;
            min-height: 60px;
        }

        .customer-name {
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 2px;
            display: block;
            color: #000;
        }

        /* Items Table */
        .items-section {
            margin-top: 0;
            border: 1px solid #999;
        }

        .items-table {
            width: 100%;
        }

        .items-table th {
            background-color: #f3f4f6;
            color: #000;
            text-transform: uppercase;
            font-size: 9px;
            padding: 5px 8px;
            text-align: left;
            border-bottom: 1px solid #999;
            font-weight: bold;
        }

        .items-table td {
            padding: 6px 8px;
            border-right: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .items-table td:last-child {
            border-right: none;
        }

        .items-table tr:last-child td {
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .item-title {
            font-weight: bold;
            margin-bottom: 2px;
            font-size: 9px;
            color: #000;
        }

        .item-desc {
            color: #4b5563;
            font-size: 8.5px;
            line-height: 1.25;
        }

        /* Combined Section: Totals + Notes/Terms + Signature */
        .combined-section {
            border-left: 1px solid #999;
            border-right: 1px solid #999;
            border-bottom: 1px solid #999;
            display: table;
            width: 100%;
        }

        .left-column {
            display: table-cell;
            width: 55%;
            vertical-align: top;
            border-right: 1px solid #999;
        }

        .totals-words {
            padding: 10px;
            border-bottom: 1px solid #999;
        }

        .totals-words-label {
            color: #4b5563;
            font-size: 10px;
            text-transform: capitalize;
            margin-bottom: 4px;
        }

        .totals-words-value {
            font-weight: bold;
            font-style: italic;
            font-size: 11px;
            color: #000;
        }

        .notes-terms {
            padding: 10px;
        }

        .info-block {
            margin-bottom: 10px;
        }

        .info-title {
            font-weight: bold;
            color: #4b5563;
            margin-bottom: 4px;
            font-size: 10px;
        }

        .info-text {
            font-size: 8.5px;
            color: #374151;
            line-height: 1.3;
        }

        .right-column {
            display: table-cell;
            width: 45%;
            vertical-align: top;
        }

        .totals-numbers {
            border-bottom: 1px solid #999;
        }

        .totals-inner-table {
            width: 100%;
        }

        .totals-inner-table td {
            padding: 3px 8px;
            text-align: right;
            font-size: 9px;
        }

        .totals-label {
            color: #4b5563;
        }

        .totals-value {
            color: #000;
        }

        .total-row {
            font-weight: bold;
            font-size: 11px;
        }

        .payment-row .totals-value{
            color: #dc2626;
        }

        .balance-row {
            background-color: #f9fafb;
            font-weight: bold;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
        }
        .balance-row .totals-value{
            color: #dc2626;
        }

        .signature-area {
            padding: 10px;
            text-align: center;
            min-height: 80px;
        }

        .signature-image {
            display: block;
            margin: 0 auto;
            max-height: 50px;
            transform: rotate(-3deg);
        }

        .signature-text {
            border-top: 1px solid #999;
            padding-top: 8px;
            margin-top: 10px;
            font-weight: bold;
            color: #4b5563;
            font-size: 10px;
            text-align: center;
        }

        /* Footer */
        .footer-section {
            margin-top: 10px;
            text-align: center;
            color: #6b7280;
            font-size: 9px;
        }

        .footer-branding {
            margin-bottom: 5px;
        }

        .footer-link {
            color: #3b82f6;
        }
    </style>
</head>

<body>
    <div class="main-border">
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td class="company-info-cell">
                    @if($invoice->logo_path)
                    <img src="{{ public_path('storage/' . $invoice->logo_path) }}"
                        style="max-width: 120px; max-height: 50px; margin-bottom: 8px;">
                    @else
                    <div class="company-name">Finext Solution</div>
                    @endif
                </td>
                <td class="tax-invoice-cell">
                    <div class="tax-invoice-title">TAX INVOICE</div>
                     <div class="company-details">
                        {!! nl2br(e($invoice->company_address ?? "Finext Solution\nBijnor, Uttar Pradesh\nIndia\n91-9258020120\nfinextsolution@gmail.com")) !!}
                        @if($invoice->gst_active && $invoice->gst_number)
                            <br><strong>GSTIN:</strong> {{ $invoice->gst_number }}
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <!-- Meta Info -->
        <div class="meta-section">
            <table class="meta-table">
                <tr>
                    <td class="meta-label">#</td>
                    <td class="meta-value">: {{ $invoice->invoice_number }}</td>
                </tr>
                <tr>
                    <td class="meta-label">Invoice Date</td>
                    <td class="meta-value">: {{ $invoice->invoice_date->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td class="meta-label">Terms</td>
                    <td class="meta-value">: {{ $invoice->payment_terms ?? 'Custom' }}</td>
                </tr>
                <tr>
                    <td class="meta-label">Due Date</td>
                    <td class="meta-value">: {{ $invoice->due_date ? $invoice->due_date->format('d/m/Y') : '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- Bill To / Ship To -->
        <div class="address-section">
            <table class="address-table">
                <tr>
                    <td class="bill-to-cell">
                        <div class="address-header">Bill To</div>
                        <div class="address-content">
                            <span class="customer-name">{{ $invoice->bill_to_name }}</span>
                            {!! nl2br(e($invoice->bill_to_address)) !!}
                        </div>
                    </td>
                    <td>
                        <div class="address-header">Ship To</div>
                        <div class="address-content">
                            @if($invoice->ship_to_active && $invoice->ship_to_name)
                            <span class="customer-name">{{ $invoice->ship_to_name }}</span>
                            {!! nl2br(e($invoice->ship_to_address)) !!}
                            @else
                            <span class="customer-name">{{ $invoice->bill_to_name }}</span>
                            {!! nl2br(e($invoice->bill_to_address)) !!}
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Items Table -->
        <div class="items-section">
            <table class="items-table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 40px;">#</th>
                        <th>Item & Description</th>
                        <th class="text-center" style="width: 80px;">HSN/SAC</th>
                        <th class="text-right" style="width: 50px;">Qty</th>
                        <th class="text-right" style="width: 80px;">Rate</th>
                        <th class="text-right" style="width: 80px;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            @php
                                $description = $item->description ?? '';
                                $title = $item->name ?? '';
                                $descText = '';
                                
                                // Fix literal '\n' that might have been saved in DB previously
                                $description = str_replace('\n', "\n", $description);
                                
                                if (empty($title)) {
                                    $parts = explode("\n", str_replace("\r\n", "\n", $description), 2);
                                    $title = $parts[0] ?? '';
                                    $descText = $parts[1] ?? '';
                                } else {
                                    $descText = $description;
                                }
                                
                                // Render Markdown text properly using Laravel's built-in Markdown
                                // This converts **Text** into <strong>Text</strong>
                                $finalDesc = \Illuminate\Support\Str::markdown($descText);
                            @endphp
                            <div class="item-title">{{ trim($title) }}</div>
                            <div class="item-desc">{!! $finalDesc !!}</div>
                        </td>
                        <td class="text-center">{{ $item->hsn_sac_code ?? '-' }}</td>
                        <td class="text-right">{{ number_format($item->quantity, 2) }}</td>
                        <td class="text-right">{{ number_format($item->rate, 2) }}</td>
                        <td class="text-right">{{ number_format($item->amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Combined Section: Totals Words + Notes/Terms (Left) | Totals Numbers + Signature (Right) -->
        <div class="combined-section">
            <div class="left-column">
                <div class="totals-words">
                    <div class="totals-words-label">Total In Words</div>
                    <div class="totals-words-value">{{ $invoice->total_in_words ?? '-' }}</div>
                </div>
                <div class="notes-terms">
                    <div class="info-block">
                        <div class="info-title">Notes</div>
                        <div class="info-text">{!! nl2br(e($invoice->notes)) !!}</div>
                    </div>
                    <div class="info-block">
                        <div class="info-title">Terms & Conditions</div>
                        <div class="info-text">{!! nl2br(e($invoice->terms_conditions)) !!}</div>
                    </div>
                </div>
            </div>
            <div class="right-column">
                <div class="totals-numbers">
                    <table class="totals-inner-table">
                        <tr>
                            <td class="totals-label">Sub Total</td>
                            <td class="totals-value">{{ number_format($invoice->subtotal, 2) }}</td>
                        </tr>
                        @if($invoice->discount_amount > 0)
                        <tr>
                            <td class="totals-label text-uppercase">Discount</td>
                            <td class="totals-value">Rs. {{ number_format($invoice->discount_amount, 2) }}</td>
                        </tr>
                        @endif
                        <tr style="background-color: #f3f4f6; font-weight: bold;">
                            <td class="totals-label text-uppercase">Taxable Amount</td>
                            <td class="totals-value">Rs. {{ number_format($invoice->taxable_amount, 2) }}</td>
                        </tr>
                        @if($invoice->sgst_amount > 0)
                        <tr>
                            <td class="totals-label text-uppercase">SGST Rate @ {{ number_format($invoice->sgst_rate, 2) }}%</td>
                            <td class="totals-value">Rs. {{ number_format($invoice->sgst_amount, 2) }}</td>
                        </tr>
                        @endif
                        @if($invoice->cgst_amount > 0)
                        <tr>
                            <td class="totals-label text-uppercase">CGST Rate @ {{ number_format($invoice->cgst_rate, 2) }}%</td>
                            <td class="totals-value">Rs. {{ number_format($invoice->cgst_amount, 2) }}</td>
                        </tr>
                        @endif
                        <tr class="total-row" style="background-color: #000; color: #fff;">
                            <td class="totals-label text-uppercase" style="color: #fff;">Payable Amount</td>
                            <td class="totals-value" style="color: #fff;">Rs. {{ number_format($invoice->total, 2) }}</td>
                        </tr>
                        <tr class="payment-row">
                            <td class="totals-label">Payment Made</td>
                            <td class="totals-value">-{{ number_format($invoice->amount_paid, 2) }}</td>
                        </tr>
                        <tr class="balance-row">
                            <td class="totals-label">Balance Due</td>
                            <td class="totals-value">Rs. {{ number_format($invoice->balance_due, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="signature-area">
                    @if($invoice->signature_path)
                    <img src="{{ public_path('storage/' . $invoice->signature_path) }}" class="signature-image">
                    @endif
                    <div class="signature-text">Authorized Signature</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-section">
            <div class="footer-branding">Crafted with ease using <strong>Finext Solution</strong></div>
            <div class="footer-branding small">Powered by <a href="https://finextsolution.com" class="footer-link">finextsolution.com</a></div>
        </div>
    </div>
</body>

</html>