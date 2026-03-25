@extends('layouts.app')

@section('title', 'Refund & Cancellation Policy')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">Refund & Cancellation Policy</h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Refund Policy</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="section-marketing" style="padding: 60px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-wrapper" style="background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                        
                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px;">Refund & Cancellation Policy – Finext Solution</h2>
                            
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Once a user chooses to avail any subscription plan or offer announced by Finext Solution and agrees to purchase the same by making the due payment, such payment made by the user shall not be refunded under any circumstances whatsoever. Please note that the act of purchasing any plan or subscription from Finext Solution is irreversible as per applicable law.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">After receipt of payment from the user for any subscription plan and upon successful KYC verification, Finext Solution shall create a User ID for the respective user on its mobile application or website.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">In case the user is unable to complete successful KYC verification, Finext Solution shall not be able to allow the user to avail the services related to that subscription plan. No existing balance or amount paid shall be refunded to the user in case of unsuccessful KYC verification. Therefore, to access and use Finext Solution’s services on its Mobile App or Website, successful KYC verification is mandatory.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Post User ID creation, while availing various services on Finext Solution’s Mobile App or Website, if any transaction fails due to reasons directly attributable to Finext Solution, and corresponding confirmation is received from the payment gateway, the failed transaction amount shall be automatically refunded to the user’s bank account within 3–15 working days from the date of transaction. A refund confirmation email will be sent to the user’s registered email address.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;"><em>*Please note that only the actual transaction amount will be refunded. Payment gateway charges and applicable taxes are non-refundable.</em></p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">However, in cases where the user has received a successful transaction confirmation but has not received the corresponding service, the user may raise a complaint via the email address mentioned on this website. Finext Solution shall promptly investigate the matter upon receiving such a complaint. In exceptional cases, Finext Solution may process a refund after deducting necessary professional or service charges, based on the outcome of the investigation.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Finext Solution’s liability shall be limited strictly to the refund of the amount actually received by the company for the relevant transaction. The company shall not be responsible for any indirect, incidental, or consequential claims arising due to system failure or service disruption.</p>

                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">The user agrees and acknowledges that this Refund Policy is subject to the Terms & Conditions and Agreements executed between Finext Solution and the user/business associate/retailer/distributor/master distributor/state head, as applicable.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
