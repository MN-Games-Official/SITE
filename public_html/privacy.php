<?php
// privacy.php — Astroyds Privacy Policy
// <!-- DRAFT COPY -->

require __DIR__ . '/src/php/config.php';
require __DIR__ . '/src/php/headers.php';
require __DIR__ . '/src/php/template_helpers.php';

send_security_headers();

$pageTitle = 'Privacy Policy — Astroyds';
$pageDescription = 'Astroyds Privacy Policy. Learn how we collect, use, and protect your personal information.';
$pageKeywords = 'privacy policy, data protection, GDPR, Astroyds';
$canonicalURL = SITE_URL . '/privacy';
$currentPage = 'privacy';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/partials/meta.php'; ?>
</head>
<body class="bg-black text-white font-sans antialiased">
    <!-- DRAFT COPY -->
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative py-20 bg-gradient-to-b from-gray-900 to-black">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Privacy Policy</h1>
                <p class="text-gray-400 text-lg">Last updated: <?php echo e(date('F j, Y')); ?></p>
            </div>
        </section>

        <!-- Privacy Policy Content -->
        <section class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert prose-lg max-w-none">

                <!-- Introduction -->
                <div class="mb-12">
                    <p class="text-gray-300 leading-relaxed">
                        <?php echo e('Astroyds'); ?> ("we," "our," or "us") is a sole proprietorship located in
                        <?php echo e('Maple Grove, Hennepin County, Minnesota 55311, USA'); ?>. We are committed to
                        protecting your privacy and ensuring the security of your personal information. This Privacy
                        Policy explains how we collect, use, disclose, and safeguard your information when you visit
                        our website and use our services.
                    </p>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        By accessing or using our website, you agree to the terms of this Privacy Policy. If you do
                        not agree with the terms of this Privacy Policy, please do not access the website.
                    </p>
                </div>

                <!-- 1. Information We Collect -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        1. Information We Collect
                    </h2>

                    <h3 class="text-xl font-semibold text-white mb-3">1.1 Information You Provide Directly</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We collect information that you voluntarily provide to us when you use our contact form or
                        otherwise communicate with us. This information may include:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-6">
                        <li><strong class="text-white">Name</strong> — Your full name, used to identify and address you in our communications.</li>
                        <li><strong class="text-white">Email Address</strong> — Your email address, used to respond to your inquiry and for follow-up correspondence.</li>
                        <li><strong class="text-white">Company Name</strong> — The name of your organization or company, if provided, to understand the context of your inquiry.</li>
                        <li><strong class="text-white">Role / Job Title</strong> — Your role or position within your organization, if provided, to better understand your needs.</li>
                        <li><strong class="text-white">Message Content</strong> — The content of your message or inquiry submitted through our contact form.</li>
                        <li><strong class="text-white">Consent Acknowledgment</strong> — Your explicit consent to our privacy policy and data processing, recorded at the time of form submission.</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-white mb-3">1.2 Information Collected Automatically</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        When you visit our website, certain information may be collected automatically, including:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-6">
                        <li><strong class="text-white">Browser Type and Version</strong> — Information about the web browser you use to access our site.</li>
                        <li><strong class="text-white">Operating System</strong> — The operating system of the device you use to access our site.</li>
                        <li><strong class="text-white">IP Address</strong> — Your Internet Protocol address, which may be used for security and analytics purposes.</li>
                        <li><strong class="text-white">Pages Visited</strong> — The pages on our website that you view and the order in which you view them.</li>
                        <li><strong class="text-white">Time and Date of Visit</strong> — When you access our website and the duration of your visit.</li>
                        <li><strong class="text-white">Referring URL</strong> — The website that referred you to our site, if applicable.</li>
                        <li><strong class="text-white">Device Information</strong> — Information about the device you use, including screen resolution and device type.</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-white mb-3">1.3 Information from Third-Party Analytics</h3>
                    <p class="text-gray-300 leading-relaxed">
                        We use Microsoft Clarity for analytics purposes. Microsoft Clarity may collect behavioral
                        data such as mouse movements, clicks, and scroll depth to help us understand how users
                        interact with our website. This data collection is consent-gated and only activated after
                        you have provided your consent through our cookie consent mechanism. For more information
                        about Microsoft Clarity's data practices, please visit
                        <a href="https://clarity.microsoft.com/terms" class="text-blue-400 hover:text-blue-300 underline" target="_blank" rel="noopener noreferrer">Microsoft Clarity's Terms</a>.
                    </p>
                </div>

                <!-- 2. How We Use Information -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        2. How We Use Your Information
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We use the information we collect for the following purposes:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                        <li><strong class="text-white">Responding to Inquiries</strong> — To respond to your contact form submissions, questions, and requests.</li>
                        <li><strong class="text-white">Communication</strong> — To communicate with you about our services, products, and business opportunities.</li>
                        <li><strong class="text-white">Website Improvement</strong> — To analyze how our website is used and improve its functionality, design, and content.</li>
                        <li><strong class="text-white">Security</strong> — To detect, prevent, and address technical issues, fraud, and security threats.</li>
                        <li><strong class="text-white">Legal Compliance</strong> — To comply with legal obligations, resolve disputes, and enforce our agreements.</li>
                        <li><strong class="text-white">Analytics</strong> — To understand user behavior and trends through aggregated, anonymized analytics data.</li>
                        <li><strong class="text-white">Service Delivery</strong> — To provide and maintain our website and services.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        We do not sell, rent, or trade your personal information to third parties for marketing
                        purposes. We do not use your personal information for automated decision-making or profiling.
                    </p>
                </div>

                <!-- 3. Cookies & Tracking -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        3. Cookies &amp; Tracking Technologies
                    </h2>

                    <h3 class="text-xl font-semibold text-white mb-3">3.1 What Are Cookies</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Cookies are small text files that are stored on your device when you visit a website. They
                        are widely used to make websites work efficiently and to provide information to website owners.
                    </p>

                    <h3 class="text-xl font-semibold text-white mb-3">3.2 Cookies We Use</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Our website uses the following types of cookies:
                    </p>

                    <div class="overflow-x-auto mb-6">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="py-3 px-4 text-white font-semibold">Cookie Type</th>
                                    <th class="py-3 px-4 text-white font-semibold">Purpose</th>
                                    <th class="py-3 px-4 text-white font-semibold">Duration</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-300">
                                <tr class="border-b border-gray-800">
                                    <td class="py-3 px-4">Essential / Strictly Necessary</td>
                                    <td class="py-3 px-4">Required for the website to function properly, including cookie consent preferences and security tokens.</td>
                                    <td class="py-3 px-4">Session / 1 year</td>
                                </tr>
                                <tr class="border-b border-gray-800">
                                    <td class="py-3 px-4">Analytics (Microsoft Clarity)</td>
                                    <td class="py-3 px-4">Used to understand how visitors interact with our website through heatmaps, session recordings, and behavioral metrics. Consent-gated.</td>
                                    <td class="py-3 px-4">Up to 1 year</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-xl font-semibold text-white mb-3">3.3 Microsoft Clarity</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We use Microsoft Clarity as our analytics platform. Microsoft Clarity provides behavioral
                        analytics tools including heatmaps, session recordings, and usage metrics. Microsoft Clarity
                        is <strong class="text-white">consent-gated</strong> on our website — it is only activated
                        after you explicitly consent to analytics cookies through our cookie consent banner.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you do not consent to analytics cookies, Microsoft Clarity will not be loaded, and no
                        behavioral data will be collected from your browsing session.
                    </p>

                    <h3 class="text-xl font-semibold text-white mb-3">3.4 Cookie Consent Preferences</h3>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        When you first visit our website, you will be presented with a cookie consent banner that
                        allows you to accept or decline non-essential cookies. Your preferences are saved and
                        respected across your browsing sessions. You can change your cookie preferences at any
                        time by clearing your browser cookies or using the cookie settings option on our website.
                    </p>

                    <h3 class="text-xl font-semibold text-white mb-3">3.5 Managing Cookies</h3>
                    <p class="text-gray-300 leading-relaxed">
                        You can control and manage cookies through your browser settings. Most browsers allow you
                        to refuse cookies, delete existing cookies, or be notified when a cookie is set. Please
                        note that disabling essential cookies may affect the functionality of our website.
                    </p>
                </div>

                <!-- 4. Data Storage & Security -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        4. Data Storage &amp; Security
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We take the security of your personal information seriously and implement appropriate
                        technical and organizational measures to protect it against unauthorized access, alteration,
                        disclosure, or destruction. These measures include:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li><strong class="text-white">Encryption</strong> — All data transmitted between your browser and our website is encrypted using TLS/SSL (HTTPS).</li>
                        <li><strong class="text-white">Access Controls</strong> — Access to personal data is restricted to authorized personnel only on a need-to-know basis.</li>
                        <li><strong class="text-white">Security Headers</strong> — We implement comprehensive security headers including Content Security Policy (CSP), X-Frame-Options, X-Content-Type-Options, and Referrer-Policy.</li>
                        <li><strong class="text-white">Input Validation</strong> — All user input is validated and sanitized to prevent injection attacks and other security vulnerabilities.</li>
                        <li><strong class="text-white">CSRF Protection</strong> — We use Cross-Site Request Forgery tokens to protect form submissions.</li>
                        <li><strong class="text-white">Rate Limiting</strong> — We implement rate limiting on form submissions to prevent abuse.</li>
                        <li><strong class="text-white">Regular Updates</strong> — We regularly update our systems, software, and security practices.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        While we strive to use commercially acceptable means to protect your personal information,
                        no method of transmission over the Internet or method of electronic storage is 100% secure.
                        We cannot guarantee absolute security, but we are committed to maintaining the highest
                        reasonable standards of data protection.
                    </p>
                </div>

                <!-- 5. Your Rights -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        5. Your Rights
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Depending on your location, you may have certain rights regarding your personal information.
                        Under the General Data Protection Regulation (GDPR) and other applicable data protection
                        laws, you may have the following rights:
                    </p>

                    <div class="space-y-6">
                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.1 Right of Access</h3>
                            <p class="text-gray-300">
                                You have the right to request a copy of the personal information we hold about you.
                                We will provide this information in a commonly used, machine-readable format within
                                30 days of receiving your request.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.2 Right to Rectification</h3>
                            <p class="text-gray-300">
                                You have the right to request that we correct any inaccurate personal information
                                we hold about you. You also have the right to have incomplete personal information
                                completed.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.3 Right to Erasure ("Right to Be Forgotten")</h3>
                            <p class="text-gray-300">
                                You have the right to request that we delete your personal information. We will
                                comply with such requests unless we have a legitimate reason to retain the data,
                                such as compliance with a legal obligation or the establishment, exercise, or
                                defense of legal claims.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.4 Right to Data Portability</h3>
                            <p class="text-gray-300">
                                You have the right to receive the personal information you have provided to us in
                                a structured, commonly used, and machine-readable format. You also have the right
                                to request that we transmit this data directly to another controller, where
                                technically feasible.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.5 Right to Restriction of Processing</h3>
                            <p class="text-gray-300">
                                You have the right to request that we restrict the processing of your personal
                                information in certain circumstances, such as when you contest the accuracy of the
                                data, when the processing is unlawful, or when we no longer need the data but you
                                require it for legal claims.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">5.6 Right to Object</h3>
                            <p class="text-gray-300">
                                You have the right to object to the processing of your personal information where
                                we are relying on legitimate interests as the legal basis for processing. We will
                                stop processing your personal information unless we can demonstrate compelling
                                legitimate grounds for the processing that override your interests, rights, and
                                freedoms.
                            </p>
                        </div>
                    </div>

                    <p class="text-gray-300 leading-relaxed mt-6">
                        To exercise any of these rights, please contact us at
                        <a href="mailto:<?php echo e('letstalk@astroyds.com'); ?>" class="text-blue-400 hover:text-blue-300 underline"><?php echo e('letstalk@astroyds.com'); ?></a>.
                        We will respond to your request within 30 days. We may ask you to verify your identity
                        before processing your request.
                    </p>
                </div>

                <!-- 6. Data Retention -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        6. Data Retention
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We retain your personal information only for as long as necessary to fulfill the purposes
                        for which it was collected, including to satisfy any legal, accounting, or reporting
                        requirements.
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li><strong class="text-white">Contact Form Submissions</strong> — Retained for up to 24 months after the last interaction, unless a longer retention period is required by law or for ongoing business purposes.</li>
                        <li><strong class="text-white">Analytics Data</strong> — Aggregated analytics data may be retained indefinitely as it does not contain personally identifiable information.</li>
                        <li><strong class="text-white">Cookie Consent Records</strong> — Your cookie consent preferences are retained for the duration specified in the cookie's expiry period.</li>
                        <li><strong class="text-white">Communication Records</strong> — Records of our communications with you may be retained for up to 36 months for quality assurance and dispute resolution purposes.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        When personal information is no longer required, we will securely delete or anonymize it
                        in accordance with our data retention and destruction policies.
                    </p>
                </div>

                <!-- 7. Third-Party Services -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        7. Third-Party Services
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Our website may use the following third-party services:
                    </p>

                    <div class="space-y-4">
                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">Microsoft Clarity</h3>
                            <p class="text-gray-300">
                                We use Microsoft Clarity for behavioral analytics including heatmaps and session
                                recordings. This service is consent-gated and only activated with your explicit
                                permission. Microsoft Clarity may process data in accordance with
                                <a href="https://privacy.microsoft.com/en-us/privacystatement" class="text-blue-400 hover:text-blue-300 underline" target="_blank" rel="noopener noreferrer">Microsoft's Privacy Statement</a>.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">Hosting Provider</h3>
                            <p class="text-gray-300">
                                Our website is hosted by a third-party hosting provider. Your data may be stored
                                on servers operated by our hosting provider. We ensure our hosting provider
                                maintains appropriate security measures and data protection practices.
                            </p>
                        </div>

                        <div class="bg-gray-900 rounded-lg p-6 border border-gray-800">
                            <h3 class="text-lg font-semibold text-white mb-2">Content Delivery Networks (CDNs)</h3>
                            <p class="text-gray-300">
                                We may use CDNs to deliver static assets such as fonts and stylesheets. These
                                services may collect technical information such as your IP address for the purpose
                                of delivering content to you efficiently.
                            </p>
                        </div>
                    </div>

                    <p class="text-gray-300 leading-relaxed mt-4">
                        We do not share your personal information with third parties for their direct marketing
                        purposes. Any third-party services we use are carefully vetted to ensure they comply with
                        applicable data protection regulations.
                    </p>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        Our website may contain links to third-party websites. We are not responsible for the
                        privacy practices of those websites. We encourage you to read the privacy policies of
                        any third-party websites you visit.
                    </p>
                </div>

                <!-- 8. Children's Privacy -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        8. Children's Privacy
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Our website and services are not directed to individuals under the age of 16. We do not
                        knowingly collect personal information from children under 16 years of age. If we become
                        aware that we have collected personal information from a child under 16, we will take
                        immediate steps to delete that information.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        If you are a parent or guardian and you believe that your child has provided us with
                        personal information, please contact us at
                        <a href="mailto:<?php echo e('letstalk@astroyds.com'); ?>" class="text-blue-400 hover:text-blue-300 underline"><?php echo e('letstalk@astroyds.com'); ?></a>
                        so that we can take appropriate action.
                    </p>
                </div>

                <!-- 9. California Privacy Rights -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        9. California Privacy Rights
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you are a California resident, you may have additional rights under the California
                        Consumer Privacy Act (CCPA) and the California Privacy Rights Act (CPRA). These rights
                        may include:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li><strong class="text-white">Right to Know</strong> — You have the right to request information about the categories and specific pieces of personal information we have collected about you, as well as the categories of sources, purposes, and third parties with whom we share it.</li>
                        <li><strong class="text-white">Right to Delete</strong> — You have the right to request that we delete the personal information we have collected from you, subject to certain exceptions.</li>
                        <li><strong class="text-white">Right to Opt-Out of Sale</strong> — We do not sell your personal information. However, you have the right to opt out of any future sale of your personal information.</li>
                        <li><strong class="text-white">Right to Non-Discrimination</strong> — We will not discriminate against you for exercising any of your privacy rights.</li>
                        <li><strong class="text-white">Right to Correct</strong> — You have the right to request that we correct inaccurate personal information.</li>
                        <li><strong class="text-white">Right to Limit Use of Sensitive Personal Information</strong> — If applicable, you have the right to limit the use and disclosure of your sensitive personal information.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        <strong class="text-white">Do Not Sell or Share My Personal Information:</strong>
                        <?php echo e('Astroyds'); ?> does not sell or share personal information as defined under
                        the CCPA/CPRA. We do not use your personal information for cross-context behavioral
                        advertising.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        To exercise your California privacy rights, please contact us at
                        <a href="mailto:<?php echo e('letstalk@astroyds.com'); ?>" class="text-blue-400 hover:text-blue-300 underline"><?php echo e('letstalk@astroyds.com'); ?></a>.
                        We will verify your identity before processing your request and respond within 45 days.
                    </p>
                </div>

                <!-- 10. Changes to This Policy -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        10. Changes to This Privacy Policy
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We reserve the right to update or modify this Privacy Policy at any time. When we make
                        changes, we will update the "Last updated" date at the top of this page. We encourage
                        you to review this Privacy Policy periodically to stay informed about how we are protecting
                        your information.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If we make material changes to this Privacy Policy that affect how we handle your personal
                        information, we will make reasonable efforts to notify you, such as by posting a prominent
                        notice on our website or by sending you an email (if we have your email address on file).
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        Your continued use of our website after any changes to this Privacy Policy constitutes
                        your acceptance of the updated policy.
                    </p>
                </div>

                <!-- 11. Contact Us -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        11. Contact Us
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you have any questions, concerns, or requests regarding this Privacy Policy or our
                        data practices, please contact us:
                    </p>
                    <div class="bg-gray-900 rounded-lg p-8 border border-gray-800">
                        <div class="space-y-3">
                            <p class="text-gray-300">
                                <strong class="text-white">Business Name:</strong> <?php echo e('Astroyds'); ?>
                            </p>
                            <p class="text-gray-300">
                                <strong class="text-white">Business Type:</strong> <?php echo e('Sole Proprietorship'); ?>
                            </p>
                            <p class="text-gray-300">
                                <strong class="text-white">Location:</strong> <?php echo e('Maple Grove, Hennepin County, Minnesota 55311, USA'); ?>
                            </p>
                            <p class="text-gray-300">
                                <strong class="text-white">Email:</strong>
                                <a href="mailto:<?php echo e('letstalk@astroyds.com'); ?>" class="text-blue-400 hover:text-blue-300 underline"><?php echo e('letstalk@astroyds.com'); ?></a>
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed mt-6">
                        We aim to respond to all privacy-related inquiries within 30 days. If you are not satisfied
                        with our response, you may have the right to lodge a complaint with a supervisory authority
                        in your jurisdiction.
                    </p>
                </div>

                <!-- Legal Basis for Processing (GDPR) -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        12. Legal Basis for Processing (GDPR)
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you are located in the European Economic Area (EEA), United Kingdom, or Switzerland,
                        we process your personal information based on the following legal grounds:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4">
                        <li><strong class="text-white">Consent</strong> — Where you have given us explicit consent to process your personal information for specific purposes, such as analytics cookies and contact form submissions.</li>
                        <li><strong class="text-white">Legitimate Interests</strong> — Where processing is necessary for our legitimate interests, such as improving our website, ensuring security, and communicating with you, provided these interests do not override your fundamental rights.</li>
                        <li><strong class="text-white">Contractual Necessity</strong> — Where processing is necessary for the performance of a contract with you or to take pre-contractual steps at your request.</li>
                        <li><strong class="text-white">Legal Obligation</strong> — Where processing is necessary to comply with a legal obligation to which we are subject.</li>
                    </ul>
                </div>

                <!-- International Data Transfers -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        13. International Data Transfers
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Our website is operated from the United States. If you are accessing our website from
                        outside the United States, please be aware that your information may be transferred to,
                        stored, and processed in the United States, where data protection laws may differ from
                        those in your country of residence.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        By using our website and providing your information, you consent to the transfer of your
                        information to the United States and its processing in accordance with this Privacy Policy.
                        Where required by applicable law, we will ensure appropriate safeguards are in place to
                        protect your personal information during international transfers.
                    </p>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
