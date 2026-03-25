@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">Privacy Policy</h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Privacy Policy</span>
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
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">This Privacy Policy explains what data <strong>Finext Solution</strong> (“Company”, “we”, “us”, “our”) collects, stores, and processes about its clients and users. It also outlines your rights regarding your personal data and how you may contact us in case of any queries or concerns.</p>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">We reserve the right to amend or update this Privacy Policy at any time. Users are advised to review this page periodically to stay informed about any changes.</p>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">1. Registration Documents Collected</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">For verification, compliance, and service activation purposes, we may collect the following documents:</p>
                            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.8; color: #666; margin-bottom: 15px;">
                                <li>Certificate of Incorporation (COI)</li>
                                <li>GST Registration Certificate</li>
                                <li>Company PAN Card</li>
                                <li>PAN Card and Aadhaar Card of the authorized signatory</li>
                                <li>Address proof of the authorized signatory (Driving License / Passport / Voter ID)</li>
                                <li>Cancelled cheque of the company</li>
                            </ul>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">2. Use of Collected Data</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">We collect, store, and process your data lawfully and only to the extent necessary for providing our services and protecting our legitimate business interests. Your data may be used for:</p>
                            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.8; color: #666; margin-bottom: 15px;">
                                <li>To provide, operate, and continue improving our services</li>
                                <li>To enhance user experience on our website and applications</li>
                                <li>To communicate with you via email, notices, or other contact methods provided by you</li>
                                <li>To share required information with third parties strictly for service delivery</li>
                                <li>To detect, prevent, and address fraud or unauthorized activities</li>
                                <li>To enforce our policies, agreements, and legal obligations</li>
                                <li>To maintain records for authentication and verification purposes</li>
                            </ul>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">3. Why We Collect Information</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">We collect your information based on legitimate business interests and only when necessary. This includes situations where you:</p>
                            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.8; color: #666; margin-bottom: 15px;">
                                <li>Are a prospective customer</li>
                                <li>Have shown interest in our services</li>
                                <li>Are an existing customer using our services</li>
                                <li>Are a job applicant applying through our careers section</li>
                            </ul>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">4. Security of Your Data</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Finext Solution takes the security of your data seriously and implements appropriate technical and organizational measures to protect it. Access is restricted to authorized personnel only.</p>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">While we follow strict procedures, no method of transmission over the internet is 100% secure; therefore, we cannot guarantee absolute security. In the event of a legally reportable breach, we will notify affected users as required by law.</p>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">5. Use of Cookies</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Cookies help us distinguish you from other users and improve site functionality. We use them for analytical purposes, including:</p>
                            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.8; color: #666; margin-bottom: 15px;">
                                <li>Browser type and version</li>
                                <li>Visitor location (approximate)</li>
                                <li>Operating system and Website usage patterns</li>
                            </ul>
                        </div>

                        <div style="margin-bottom: 30px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">6. Changes & Accuracy</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">Any updates will be posted on this page. Where appropriate, we may notify you via email. It is important that the personal data we hold about you remains accurate. Please inform us promptly of any changes.</p>
                        </div>

                        <div style="margin-bottom: 30px; padding: 25px; background-color: #f8f9fa; border-left: 4px solid #0d6efd; border-radius: 4px;">
                            <h2 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">7. Contact Information</h2>
                            <p style="margin-bottom: 15px; line-height: 1.8; color: #666;">For any questions, concerns, or requests related to this Privacy Policy, you may contact us at:</p>
                            <div>
                                <p style="margin-bottom: 8px; color: #666;"><strong>Email:</strong> <a href="mailto:Support@finextsolution.com" style="color: #0d6efd; text-decoration: none;">Support@finextsolution.com</a></p>
                                <p style="margin-bottom: 0; color: #666;"><strong>Website:</strong> <a href="https://finextsolution.com" style="color: #0d6efd; text-decoration: none;">https://finextsolution.com</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
