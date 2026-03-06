<?php
// terms.php — Astroyds Terms of Service
// <!-- DRAFT COPY -->

require __DIR__ . '/src/php/config.php';
require __DIR__ . '/src/php/headers.php';
require __DIR__ . '/src/php/template_helpers.php';

send_security_headers();

$pageTitle = 'Terms of Service — Astroyds';
$pageDescription = 'Astroyds Terms of Service. Please read these terms carefully before using our website.';
$pageKeywords = 'terms of service, terms and conditions, legal, Astroyds';
$canonicalURL = SITE_URL . '/terms';
$currentPage = 'terms';
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
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Terms of Service</h1>
                <p class="text-gray-400 text-lg">Last updated: <?php echo e(date('F j, Y')); ?></p>
            </div>
        </section>

        <!-- Terms of Service Content -->
        <section class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert prose-lg max-w-none">

                <!-- Introduction -->
                <div class="mb-12">
                    <p class="text-gray-300 leading-relaxed">
                        Welcome to <?php echo e('Astroyds'); ?>. These Terms of Service ("Terms") govern your
                        access to and use of the <?php echo e('Astroyds'); ?> website and all associated services
                        (collectively, the "Service"). <?php echo e('Astroyds'); ?> is a sole proprietorship
                        located in <?php echo e('Maple Grove, Hennepin County, Minnesota 55311, USA'); ?>.
                    </p>
                    <p class="text-gray-300 leading-relaxed mt-4">
                        Please read these Terms carefully before using our website. By accessing or using the
                        Service, you agree to be bound by these Terms. If you do not agree with any part of
                        these Terms, you must not use the Service.
                    </p>
                </div>

                <!-- 1. Acceptance of Terms -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        1. Acceptance of Terms
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        By accessing, browsing, or using this website, you acknowledge that you have read,
                        understood, and agree to be bound by these Terms of Service and our
                        <a href="/privacy" class="text-blue-400 hover:text-blue-300 underline">Privacy Policy</a>,
                        which is incorporated herein by reference.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you are using the Service on behalf of an organization, you represent and warrant that
                        you have the authority to bind that organization to these Terms. In such cases, "you" and
                        "your" will refer to that organization.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        We reserve the right to modify these Terms at any time. Your continued use of the Service
                        following any modifications constitutes your acceptance of the revised Terms. It is your
                        responsibility to review these Terms periodically.
                    </p>
                </div>

                <!-- 2. Use License -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        2. Use License
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Subject to your compliance with these Terms, <?php echo e('Astroyds'); ?> grants you a
                        limited, non-exclusive, non-transferable, revocable license to access and use the Service
                        for your personal or internal business purposes.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        This license does not include the right to:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>Modify, copy, or create derivative works based on the Service or its content.</li>
                        <li>Use the Service for any commercial purpose not expressly authorized by <?php echo e('Astroyds'); ?>.</li>
                        <li>Reverse engineer, decompile, or disassemble any software or technology used in the Service.</li>
                        <li>Remove, alter, or obscure any proprietary notices, labels, or marks on the Service.</li>
                        <li>Use any data mining, robots, scraping, or similar data gathering or extraction methods on the Service.</li>
                        <li>Sublicense, sell, resell, transfer, assign, or distribute the Service or any content therein.</li>
                        <li>Use the Service in any manner that could disable, overburden, damage, or impair the Service.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        This license shall automatically terminate if you violate any of these restrictions and
                        may be terminated by <?php echo e('Astroyds'); ?> at any time, for any reason, without notice.
                    </p>
                </div>

                <!-- 3. User Conduct -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        3. User Conduct
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        You agree to use the Service only for lawful purposes and in accordance with these Terms.
                        You agree not to:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>Use the Service in any way that violates any applicable federal, state, local, or international law or regulation.</li>
                        <li>Submit false, misleading, or fraudulent information through our contact form or any other means.</li>
                        <li>Impersonate or attempt to impersonate <?php echo e('Astroyds'); ?>, an <?php echo e('Astroyds'); ?> employee, another user, or any other person or entity.</li>
                        <li>Engage in any conduct that restricts or inhibits anyone's use or enjoyment of the Service.</li>
                        <li>Introduce any viruses, trojan horses, worms, logic bombs, or other malicious or technologically harmful material.</li>
                        <li>Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of the Service, the server on which the Service is stored, or any server, computer, or database connected to the Service.</li>
                        <li>Attack the Service via a denial-of-service attack or a distributed denial-of-service attack.</li>
                        <li>Use the Service to send unsolicited commercial communications (spam).</li>
                        <li>Harvest or collect email addresses or other contact information of other users from the Service.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        We reserve the right to take any action we deem necessary to prevent or address violations
                        of these Terms, including but not limited to blocking your access to the Service.
                    </p>
                </div>

                <!-- 4. Intellectual Property -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        4. Intellectual Property
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        The Service and its entire contents, features, and functionality — including but not limited
                        to all information, software, text, displays, images, graphics, video, audio, design,
                        selection, and arrangement thereof — are owned by <?php echo e('Astroyds'); ?>, its licensors,
                        or other providers of such material and are protected by United States and international
                        copyright, trademark, patent, trade secret, and other intellectual property or proprietary
                        rights laws.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        The <?php echo e('Astroyds'); ?> name, logo, and all related names, logos, product and service
                        names, designs, and slogans are trademarks of <?php echo e('Astroyds'); ?> or its affiliates.
                        You must not use such marks without the prior written permission of <?php echo e('Astroyds'); ?>.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        All other trademarks, registered trademarks, product names, and company names or logos
                        mentioned on the Service are the property of their respective owners. Reference to any
                        products, services, processes, or other information by trade name, trademark, manufacturer,
                        supplier, or otherwise does not constitute or imply endorsement, sponsorship, or
                        recommendation by <?php echo e('Astroyds'); ?>.
                    </p>
                </div>

                <!-- 5. Contact Form Submissions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        5. Contact Form Submissions
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        When you submit information through our contact form, you agree to the following:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>All information you provide is truthful, accurate, and complete to the best of your knowledge.</li>
                        <li>You consent to <?php echo e('Astroyds'); ?> collecting and processing the submitted information in accordance with our <a href="/privacy" class="text-blue-400 hover:text-blue-300 underline">Privacy Policy</a>.</li>
                        <li>You will not submit any content that is unlawful, harmful, threatening, abusive, harassing, defamatory, vulgar, obscene, or otherwise objectionable.</li>
                        <li>You will not submit any content that infringes upon the intellectual property rights of any third party.</li>
                        <li>You will not use the contact form to send spam, phishing attempts, or other unsolicited communications.</li>
                        <li>Submission of the contact form does not create a binding contract, partnership, agency, or employment relationship between you and <?php echo e('Astroyds'); ?>.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        <?php echo e('Astroyds'); ?> reserves the right to disregard or delete any submission that
                        violates these Terms or that we deem inappropriate, at our sole discretion.
                    </p>
                </div>

                <!-- 6. Disclaimers -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        6. Disclaimers
                    </h2>
                    <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 mb-4">
                        <p class="text-gray-300 leading-relaxed uppercase text-sm font-semibold">
                            THE SERVICE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS, WITHOUT ANY WARRANTIES
                            OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES
                            OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, NON-INFRINGEMENT, OR COURSE OF
                            PERFORMANCE.
                        </p>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        <?php echo e('Astroyds'); ?>, its owners, operators, employees, agents, and affiliates do
                        not warrant that:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>The Service will be available at all times, uninterrupted, timely, secure, or error-free.</li>
                        <li>The results obtained from the use of the Service will be accurate, reliable, or complete.</li>
                        <li>The quality of any products, services, information, or other material obtained through the Service will meet your expectations.</li>
                        <li>Any errors in the Service will be corrected.</li>
                        <li>The Service or the servers that make it available are free of viruses or other harmful components.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        Any content, materials, information, or software downloaded or otherwise obtained through
                        the use of the Service is accessed at your own discretion and risk. You will be solely
                        responsible for any damage to your computer system or loss of data that results from the
                        download of any such material.
                    </p>
                </div>

                <!-- 7. Limitation of Liability -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        7. Limitation of Liability
                    </h2>
                    <div class="bg-gray-900 rounded-lg p-6 border border-gray-800 mb-4">
                        <p class="text-gray-300 leading-relaxed uppercase text-sm font-semibold">
                            TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT SHALL
                            <?php echo e('ASTROYDS'); ?>, ITS OWNER, OFFICERS, DIRECTORS, EMPLOYEES, AGENTS, OR
                            AFFILIATES BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE
                            DAMAGES, INCLUDING WITHOUT LIMITATION, LOSS OF PROFITS, DATA, USE, GOODWILL, OR OTHER
                            INTANGIBLE LOSSES, RESULTING FROM:
                        </p>
                    </div>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>Your access to, use of, or inability to access or use the Service.</li>
                        <li>Any conduct or content of any third party on the Service.</li>
                        <li>Any content obtained from the Service.</li>
                        <li>Unauthorized access, use, or alteration of your transmissions or content.</li>
                        <li>Any bugs, viruses, trojan horses, or the like that may be transmitted to or through the Service by any third party.</li>
                        <li>Any errors or omissions in any content or for any loss or damage incurred as a result of the use of any content posted, emailed, transmitted, or otherwise made available through the Service.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        In no event shall <?php echo e('Astroyds'); ?>'s total liability to you for all damages,
                        losses, or causes of action exceed the amount you have paid to <?php echo e('Astroyds'); ?>
                        in the twelve (12) months preceding the claim, or one hundred U.S. dollars ($100.00),
                        whichever is greater.
                    </p>
                </div>

                <!-- 8. Indemnification -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        8. Indemnification
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        You agree to defend, indemnify, and hold harmless <?php echo e('Astroyds'); ?>, its owner,
                        employees, agents, and affiliates from and against any and all claims, damages, obligations,
                        losses, liabilities, costs, or debt, and expenses (including but not limited to attorney's
                        fees) arising from:
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2 ml-4 mb-4">
                        <li>Your use of and access to the Service.</li>
                        <li>Your violation of any term of these Terms.</li>
                        <li>Your violation of any third-party right, including without limitation any copyright, trademark, property, or privacy right.</li>
                        <li>Any claim that your use of the Service caused damage to a third party.</li>
                        <li>Any content you submit or transmit through the Service.</li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed">
                        This defense and indemnification obligation will survive these Terms and your use of the
                        Service. <?php echo e('Astroyds'); ?> reserves the right, at its own expense, to assume
                        the exclusive defense and control of any matter otherwise subject to indemnification by
                        you, and you agree to cooperate with our defense of these claims.
                    </p>
                </div>

                <!-- 9. Governing Law -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        9. Governing Law &amp; Jurisdiction
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        These Terms shall be governed by and construed in accordance with the laws of the
                        <?php echo e('State of Minnesota'); ?>, United States of America, without regard to its
                        conflict of law provisions.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Any legal suit, action, or proceeding arising out of, or related to, these Terms or the
                        Service shall be instituted exclusively in the federal courts of the United States or the
                        courts of the <?php echo e('State of Minnesota'); ?>, in each case located in
                        <?php echo e('Hennepin County'); ?>. You waive any and all objections to the exercise of
                        jurisdiction over you by such courts and to venue in such courts.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        Any cause of action or claim you may have arising out of or relating to these Terms or
                        the Service must be commenced within one (1) year after the cause of action accrues;
                        otherwise, such cause of action or claim is permanently barred.
                    </p>
                </div>

                <!-- 10. Severability -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        10. Severability
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If any provision of these Terms is held to be unenforceable or invalid by a court of
                        competent jurisdiction, such provision shall be changed and interpreted so as to best
                        accomplish the objectives of the original provision to the fullest extent permitted by
                        law, and the remaining provisions of these Terms shall continue in full force and effect.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        The failure of <?php echo e('Astroyds'); ?> to enforce any right or provision of these Terms
                        shall not constitute a waiver of future enforcement of that right or provision. The waiver
                        of any such right or provision shall be effective only if in writing and signed by a duly
                        authorized representative of <?php echo e('Astroyds'); ?>.
                    </p>
                </div>

                <!-- 11. Changes to Terms -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        11. Changes to These Terms
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        <?php echo e('Astroyds'); ?> reserves the right, at its sole discretion, to modify or
                        replace these Terms at any time. If a revision is material, we will provide at least
                        30 days' notice prior to any new terms taking effect. What constitutes a material change
                        will be determined at our sole discretion.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        We will indicate the date of the last revision at the top of this page. It is your
                        responsibility to check these Terms periodically for changes. Your continued use of the
                        Service following the posting of revised Terms means you accept and agree to the changes.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        If you do not agree to the new terms, you are no longer authorized to use the Service
                        and should discontinue use immediately.
                    </p>
                </div>

                <!-- 12. Contact -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        12. Contact Information
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        If you have any questions about these Terms of Service, please contact us:
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
                </div>

                <!-- Entire Agreement -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-white mb-6 border-b border-gray-700 pb-3">
                        13. Entire Agreement
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        These Terms, together with the <a href="/privacy" class="text-blue-400 hover:text-blue-300 underline">Privacy Policy</a>
                        and any other legal notices or agreements published by <?php echo e('Astroyds'); ?> on the
                        Service, shall constitute the entire agreement between you and <?php echo e('Astroyds'); ?>
                        concerning the Service.
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        No waiver of any term of these Terms shall be deemed a further or continuing waiver of
                        such term or any other term, and <?php echo e('Astroyds'); ?>'s failure to assert any right
                        or provision under these Terms shall not constitute a waiver of such right or provision.
                    </p>
                </div>

            </div>
        </section>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
