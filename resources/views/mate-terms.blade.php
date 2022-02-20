@extends('layouts.app')

@section('title', __('message.Terms of study'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <b>{{ __('message.Terms of study') }}</b>
            <p>{{ __('message.Established and enforcement date: September 17, 3rd year') }}</p>
            <p>
                {{ __('message.Init (https://init-online.com or less, This service) is the following Term Conditions (hereinafter referred to as General Terms.) Accepted It is a service that provides only to the person (defined by Article 1, paragraph 1, first item 1 below.). Students shall use this service after agreement with the contents of this term in advance.') }}
            </p>
            <br>
            <b>{{ __('message.1. Definition / Content of this service') }}</b><br>
            <p>
                1-1. {{ __('message.In this agreement, the terms of each of the following items shall have the prescribed meaning of each item.') }}<br>
                &nbsp; ①{{ __('message.Lesson: A general term for teaching knowledge, providing information, training in conversation and performance, and giving advice.') }}<br>
                &nbsp; ②{{ __('message.Students: Those who wish to take lessons or actually take them') }}<br>
                &nbsp; ③{{ __('message.Adviser: A person who wants or actually provides a lesson') }}<br>
                &nbsp; ④{{ __('message.Lesson contract: A contract regarding the provision and attendance of lessons concluded between the adviser and the student.') }}<br>
                &nbsp; ⑤{{ __('message.Lesson fee: Fee paid by the student to the adviser through our company in consideration of the lesson contract') }}<br>
                &nbsp; ⑥{{ __('message.6 Matching Service: Service that mediates the sign of lesson contract and payment of lesson fee') }}<br>
                &nbsp; ⑦{{ __('message.Matching fee: Fee paid by the student to the Company as a consideration for using the matching service') }}<br>
                &nbsp; {{ __('message.8 Service Fee: Total amount of lesson fee and matching fee') }}<br>
                &nbsp; ⑨{{ __('message.Coin: An electromagnetic record given to students by the Company in exchange for a certain amount of money, which is a means of paying service fees.') }}<br>
                &nbsp; ⑩{{ __('message.Our site: The latest website operated by our company') }}<br>
                {{ __('message.1-2. This service uses the following items of the following items.') }}<br>
                &nbsp; ①{{ __('message.1 Service that searches for lessons by students, application for lesson contracts, application for application lesson contracts, etc.') }}によるレッスンの検索、レッスン契約の申込、申込済みのレッスン契約の管理等を容易にするサービス<br>
                &nbsp; ② {{ __('message.Matching service') }}<br>
                &nbsp; ③ {{ __('message.A service that provides counseling to students regarding the services of the previous items') }}<br>
                &nbsp; ④ {{ __('message.Service to give lessons to students') }}<br>
                &nbsp; ⑤ {{ __('message.A service that regularly or irregularly distributes updated information on our site, campaign information, and other information separately determined by our company to students by e-mail (hereinafter referred to as email magazine service).') }}<br>
                &nbsp; ⑥ {{ __('message.A service that facilitates the advisers acceptance of lesson contract applications from students') }}<br>
                &nbsp; ⑦ {{ __('message.Other services separately determined by the Company') }}<br>
            </p>
            <br>
            <b>2. {{ __('message.Application of terms') }}</b>
            <p>
                {{ __('message.2-1. The Terms of Terms shall apply for the use of this service by the student.') }}<br>
                {{ __('message.2-2. All notices that the Company issues to students based on Article 3 including the terms of use and regulations established by the Company apart from these Terms and the postings on the Companys site (hereinafter collectively referred to as the Company. Terms of Service, etc. Established by) shall each form part of these Terms.') }}<br>
                2-3. {{ __('message.If the provisions of this agreement differ from the terms of use, provisions, and notifications set forth in the preceding paragraph, the notice, provisions, terms of use, and agreement shall be applied in that order. If the content of the notification posted on our site is different from the content of the notification by other methods, the one notified later shall be applied with priority.') }}<br>
                {{ __('message.2-4. Advisers use of the service shall apply separately to the adviser terms that we establish separately.') }}<br>
                {{ __('message.2-5. Date and time in this term shall follow the standard time of Japan.') }}<br>
            </p>
            <br>
            <b>3. {{ __('message.Notice from us') }}</b>
            <p>
                {{ __('message.3-1. The Company shall notify students who need to be determined that the Company needs to be necessary by the students by any means, by handicapping, posting emails, sending emails, sending emails and other methods. increase.') }}<br>
                {{ __('message.3-2. Notifications of the preceding paragraph will post notifications of the preceding paragraph on our site, send e-mails or sending documents, and we post and send emails Or, it shall produce that potency from the time of shipping the document.') }}
            </p>
            <br>
            <b>4. {{ __('message.Eligibility to use this service') }}</b>
            <p>
                {{ __('message.If the student is a minor, we shall get the consent of the custody or guardian regarding the use of this service.') }}
            </p>
            <br>
            <b>5. {{ __('message.Regarding the use of this service') }}</b>
            <p>
                {{ __('message.5-1. Students will be asked about the truth, accuracy, certainty, reliability, usefulness, etc. of the information provided by the Company, as well as the quality, accuracy, certainty, reliability, usefulness, etc. of this service. You make your own judgment and agree in advance to use these at your own risk.') }}<br>
                {{ __('message.5-2. Students shall determine their own quality, accuracy, reliability, usefulness, etc. of the lessons provided by the adviser, and we will agree in advance to use them at their own responsibility .') }}<br>
                {{ __('message.5-3. Before applying for a lesson contract, students should thoroughly check the information about the adviser who provides the lesson before applying for the lesson contract, and question the identity of the adviser and the content of the lesson to be provided. If there is, we will contact the adviser directly using the mail function to the adviser on this service.') }}<br>
                {{ __('message.5-4. Lessons shall be provided by the adviser as a principle, and the Company does not provide lessons, except when we admit separately.') }}<br>
                {{ __('message.5-5. Students shall agree in advance that the adviser may be a lesson only for voice and the adviser differences.') }}<br>
                {{ __('message.5-6. The Company shall not assess and manage the information provided by the adviser and the adviser and the student.') }}<br>
                {{ __('message.5-7. Our company shall not be guaranteed to all about the truth, accuracy, certainty, reliability, beneficiality, etc. of various information posted by advisers and other advisers.') }}<br>
                {{ __('message.5-8. The Company does not take any responsibility even if the advisers or omissions of the adviser or the third party suffered damage or losses.') }}<br>
                5-9. {{ __('message.The Company shall not be liable for any information, files, articles, etc. provided to each other between the student and the adviser, and the student shall provide the student with such information, files, articles, etc. You agree in advance that we will not be liable for any kind of damage or loss that occurs.') }}<br>
            </p>
            <br>
            <b>{{ __('message.6. Trouble with other students') }}</b>
            <p>
                {{ __('message.In the unlikely event that a problem occurs between the student and another student, adviser or other third party, such as suffering some damage or inconvenience from another student, adviser or other third party. , We will try to solve the problem at our own risk and expense, and if our company suffers damage in connection with the trouble, all the damage (including but not limited to reasonable attorneys fee) ) Shall be liable for immediate compensation. If the Company resolves the problem, all expenses (including but not limited to reasonable attorneys fees) required for the resolution will be borne by the student.') }}
            </p>
            <br>
            <b>7. {{ __('message.Registration') }}</b>
            <p>
                {{ __('message.7-1. Students enter their name, gender, e-mail address, desired password, country of residence and other information separately specified by us in the input form on the student registration page on our site, and enter this into us. Student registration application (hereinafter referred to as student registration application) shall be made by the method of sending or other methods specified separately by the Company. In addition, the student shall not allow a third party to apply for student registration unless otherwise approved by the Company.') }}<br>
                {{ __('message.7-2. The students shall not enter false content when applying for a student registration.') }}<br>
                {{ __('message.7-3. The Company shall send an e-mail to the students to accept the student registration application.') }}<br>
                {{ __('message.7-4. The Company may not accept the registration application application without disclosing the reason, if any of the following items.') }}<br>
                &nbsp; {{ __('message.(1) If it is found that the student registration application has been made by a third party other than the student (but except when we admit separately.)') }}<br>
                &nbsp; {{ __('message.2 If it has been found that there was false, false or input leaks in the content input at the time of registration application application') }}<br>
                &nbsp; {{ __('message.(3) When it is found that the student has received a temporary disposition of the student registration due to a violation of the Terms and the like in the past') }}<br>
                &nbsp; {{ __('message.(4) If the number of blocks from the adviser reaches a certain level, and it is difficult to continue using the service by the students and the Company judged') }}<br>
                &nbsp; {{ __('message.5 If our company is judged if you do not want to attend for a fee, such as the number of free lessons are significantly.') }}<br>
                &nbsp; {{ __('message.6. Other if we judge that we are inappropriate to accept the attendee registration application') }}<br>
                {{ __('message.7-5. The student will immediately report to our company by the way that the Company will definitely change if you change the name, e-mail address, residence and other information that we entered at the time of registration application. .') }}<br>
                {{ __('message.7-6. Students may cancel their student registration by following the procedures separately determined by the Company. In addition, the unused points held by the student at the time when the student registration is deleted based on the main text of this section shall be extinguished at that time and shall not be refunded.') }}
            </p>
            <br>
            <b>{{ __('message.8. Mail Magazine Service') }}</b>
            <p>
                {{ __('message.8-1. The student shall be able to choose whether or not to receive the mail magazine service when applying for a student registration.') }}<br>
                {{ __('message.8-2. The student is an email (hereinafter referred to as e-mail magazine) delivered by the e-mail magazine service.') }}<br>
                {{ __('message.8-3. The Company provides the e-mail newsletter service to the extent that the Company deems it necessary, and does not guarantee that the e-mail newsletter will be delivered regularly or to all students. , Students agree in advance that we may or may not be able to provide the e-mail newsletter service.') }}<br>
                {{ __('message.8-4. The students can reject mail magazine delivery by the procedure separately defined by the Company.') }}
            </p>
            <br>
            <b>{{ __('message.9. Stopping this service · Erasing the student registration by our company') }}</b>
            <p>
                {{ __('message.If a student falls under any of the following items, the Company may suspend the provision of this service to the student or cancel the student registration without prior notice. increase. In addition, the unused points held by the student at the time when the student registration is deleted based on the main text of this article shall be extinguished at that time and shall not be refunded.') }}<br>
                &nbsp; {{ __('message.1 If it has been found that the temporary registration of the student registration was received due to the violation of the Terms of Terms and the like in the past') }}<br>
                &nbsp; ② {{ __('message.Article 16 When performing the acts specified in each issue') }}<br>
                &nbsp; ③ {{ __('message.In addition to the provisions of the preceding two items, if you violate this agreement') }}<br>
                &nbsp; {{ __('message.4 In addition, if our company is judged if it is inappropriate to provide this service or maintain a student registration') }}<br>
            </p>
            <br>
            <b>10. {{ __('message.Password management and use, etc.') }}</b>
            <p>
                {{ __('message.10-1. The student shall be responsible for the management and use of the password (hereinafter referred to as password) issued by the company.') }}<br>
                {{ __('message.10-2. The students shall not transfer, or disclose or use passwords to third parties, unless we admit separately.') }}<br>
                {{ __('message.10-3. In terms of disadvantages, damages, tampering, etc., such as an erroneous use of a password or a third party, etc., a student who owns the password is responsible for any responsibility, and the Company is responsible I do not want to') }}<br>
                {{ __('message.10-4. Students will contact us immediately if you find that there is an unauthorized use such as a third party, etc. It will be') }}<br>
            </p>
            <br>
            <b>11. {{ __('message.Cost burden') }}</b>
            <p>
                {{ __('message.11-1. Students need hardware (including but not limited to PCs, headsets, microphones, earphones, etc.) and software (see below) to use this service or take lessons. Including, but not limited to, the calling software specified in Article 17, Paragraph 1), communication lines and everything else shall be prepared at your own risk and expense.') }}<br>
                {{ __('message.11-2. Students will appreciate that the use of this service or lesson will be determined in the preceding paragraph. Bear out.') }}
            </p>
            <br>
            <b>{{ __('message.12. Establishment of lesson contract') }}</b>
            <p>
                {{ __('message.12-1. The lesson contract shall be established when the adviser sends an e-mail that the adviser will use the system on this service using the system on the service. .') }}<br>
                {{ __('message.12-2. Students may not accept the lesson contract application by the adviser or cancel the lesson contract after it is established, based on the Cancellation Policy (for advisers) separately set by the Company. I agree in advance.') }}
            </p>
            <br>
            <b>{{ __('message.13. Purchase, management, use, etc. of coin') }}</b>
            <p>
                {{ __('message.13-1. Students shall purchase coins from us and pay us the service fee by using the purchased coins. Of the service fees, the lesson fee shall be paid by our company by transfer of cash to the adviser on behalf of the student.') }}<br>
                {{ __('message.13-2. An adviser shall determine the number of coins required for service fee payment.') }}<br>
                {{ __('message.13-3. At the same time, the number of courses of the students will be subtracted from the held coins of the student from the held coin of the student.') }}<br>
                {{ __('message.13-4. Students shall be able to purchase coins from our company before applying for a lesson contract.') }}<br>
                {{ __('message.13-5. When purchasing coins from our company, we must agree in advance that we must purchase a certain number of coins separately specified separately.') }}<br>
                {{ __('message.13-6. The purchase price of coin is 1 coin 100 yen (tax included) except when we set up separately.') }}<br>
                13-7. {{ __('message.If you wish to purchase coins, the Company shall make purchase application (hereinafter referred to as purchase application) by the method of specifying separately.') }}<br>
                {{ __('message.13-8. Students shall not enter false content during purchase application.') }}<br>
                {{ __('message.13-9. Purchasing of coin is payment by bank transfer, and a credit card of the student identifier (which will be limited to what is issued by a credit card company separately.) PayPal (Paypal) Payments Other Payments will be paid by the method separately.') }}<br>
                {{ __('message.13-10. After making a purchase application, we will agree in advance that we can not withdraw or cancel the purchase application except when we admit separately.') }}<br>
                {{ __('message.13-11. If any of the following items are applicable to any of the following items, I can take the quarter of coin without prior notice.') }}<br>
                &nbsp; {{ __('message.1 If it has been found that purchase application has been done by third parties other than the students') }}<br>
                &nbsp; {{ __('message.(2) When it is found that there was false, error or input leaks in the content entered by the student during purchase application') }}<br>
                &nbsp; {{ __('message.3 If it is found that another persons credit card was used for payment of coin purchase price') }}<br>
                &nbsp; {{ __('message.4 In addition to the preceding items, if the student violates this Terms') }}<br>
                &nbsp; {{ __('message.5. Other cases where our company is judged if the Company needs to take the erasure of the coin.') }}<br>
                {{ __('message.13-12. The student shall not use coins for purposes other than service fee payment.') }}<br>
                {{ __('message.13-13. The effective period of coin is that the Company has issued coins to the students three months, and the coin will disappear when we have elapsed for three months from the date of issuing coins. In addition, the effective period of the coin shall be individually involved and calculated for each coin, and it does not extend for any reason.') }}<br>
                {{ __('message.13-14. Students shall be responsible for the use and management of coins.') }}<br>
                {{ __('message.13-15. The students shall not transfer or loen or use coins to third parties.') }}<br>
                {{ __('message.13-16. In terms of disadvantages, damages, tampering, etc., such as errors or third-party unauthorized use, etc. I do not want to') }}<br>
                {{ __('message.13-17. Students will contact us immediately if you find that no coin is used by third parties, etc. I will follow it immediately.') }}<br>
                {{ __('message.13-18. The student shall be accounted for in advance that coin reissue is not performed for any reason, including if a third party is used incorrectly.') }}<br>
            </p>
            <br>
            <b>14. {{ __('message.Usage coin return') }}</b>
            <p>
                {{ __('message.14-1. Canceling a lesson contract or a lesson time after the term of a lesson contract by a student or a loss of lesson time, and return use coin when canceled (from the preceding paragraph 3, from the preceding paragraph 3 It means to return the drawn coins as a coin of the student. The same applies to the handling of the company. will do.') }}<br>
                {{ __('message.14-2. Otherwise, the students shall be able to return the usage coin to the Company if any of the following items are specified in the following section.') }}<br>
                &nbsp; {{ __('message.1 Lesson contract after establishment is canceled with only our side or in the adviser side, and if the student claims coin return to our company based on that fact.') }}<br>
                {{ __('message.14-3. The Company can request the students who need to determine that the Company needs to be requested by the Company, and the student can immediately respond to the request. It must be.') }}<br>
                &nbsp; {{ __('message.1 If the student or adviser cancels the lesson contract after the establishment') }}<br>
                &nbsp; {{ __('message.2 If our company determines if the adviser may violate or violate the advisers') }}<br>
                &nbsp; ③ {{ __('message.In addition, when we deem it necessary') }}<br>
                {{ __('message.14-4. As a result of our investigation with the largest sincerity for both the students and the adviser, the Company finally judge The students and advisers shall follow this.') }}<br>
                {{ __('message.14-5. Even in the case of Section 1 of this Article or Section 2 of this section, if a student was violated by a student in connection with a lesson contract that was a target of coin use, it has been found Both coin return is not performed.') }}<br>
            </p>
            <br>
            <b>{{ __('message.15. Prohibition of coin refund') }}</b>
            <p>
                {{ __('message.Unless defined in Article 25, paragraph 2, the purchased coin refund is not performed.') }}
            </p>
            <br>
            <b>16. {{ __('message.Prohibited matter') }}</b>
            <p>
                {{ __('message.16-1. Students shall not conduct the act of the following items in connection with the use of this service or take a lesson.') }}<br>
                &nbsp; {{ __('message.1 Acts to send or post information against facts') }}<br>
                &nbsp; {{ __('message.2 Acts to tamper or erase information that can be used by this service or acts that attempts it') }}<br>
                &nbsp; {{ __('message.3 Other students, advisers, other third parties or other acts that violate intellectual property rights such as our copyright, trademark rights, acts that may violate') }}<br>
                &nbsp; {{ __('message.4 Other students, advisers or other third parties or our company discrimination or slandering or other students and other third or other third or other third party or our honor or credit') }}<br>
                &nbsp; {{ __('message.5 Other students, advisers, other third parties or our property, privacy, portrait right or act of violating the right to violate') }}<br>
                &nbsp; {{ __('message.6 Other students, advisers, other third or other third parties or other people who send e-mails such as advertising, advertising, solicitation, etc. Acts that interfere with e-mail reception, act that requests a third party or an act that conducts email transfer according to the request') }}<br>
                &nbsp; {{ __('message.7 Acts connected to crimes such as fraud') }}<br>
                &nbsp; ⑧ {{ __('message.Acts aimed at soliciting religions, political associations, MLM, etc.') }}<br>
                &nbsp; ⑨ {{ __('message.Acts of sending or posting obscene or child abuse behaviors, acts, images, documents, etc.') }}<br>
                &nbsp; ⑩ {{ __('message.Election campaigns or similar acts or acts that violate the Public Offices Election Act') }}<br>
                &nbsp; {{ __('message.11 Acts or acts that use harmful programs such as computer virus or provide a third party') }}<br>
                &nbsp; {{ __('message.12 Other students, advisers and other third parties, acts to use this service') }}<br>
                &nbsp; ⑬ {{ __('message.Attempting unauthorized access to other computer systems or networks connected to this service') }}<br>
                &nbsp; {{ __('message.14 In addition to the preceding items, the acts of contrary to law or public order and morals (including prostitution, violence, atrocities etc. but are not limited to these.) Or other students, advisers, other third or other third party or our company Acts to give') }}<br>
                &nbsp; {{ __('message.15 Other students, advisers Introduce services that may compete or conflict with this service for other third parties') }}<br>
                &nbsp; {{ __('message.16 Create multiple accounts by the same person') }}<br>
                &nbsp; ⑰ {{ __('message.Violent demands or unreasonable demands beyond legal responsibility') }}<br>
                &nbsp; ⑱ {{ __('message.Acts of threatening behavior or using violence in relation to transactions') }}<br>
                &nbsp; ⑲ {{ __('message.Acts of disseminating rumors, damaging the credibility of the other party or interfering with the other partys business by using counterfeiting or power') }}<br>
                &nbsp; {{ __('message.⑳ A third party such as advisers and other students, an act that gives or imparts mental pain') }}<br>
                &nbsp; {{ __('message.㉑ Init Secretariat and Take a Lesson Seminar without the permission of the adviser, recording, recording, recording') }}<br>
                &nbsp; {{ __('message.㉒ The act of reconnaissance of the lesson and the purpose of the purpose of being for the purpose of carrying out the content of the lesson to be provided in our site or outside site, service etc.') }}<br>
                &nbsp; ㉓ {{ __('message.Acts that promote or promote the acts specified in the preceding items') }}<br>
                &nbsp; ㉔ {{ __('message.Other acts that the Company deems inappropriate') }}<br>
                {{ __('message.16-2. Students can use this service and conclude a lesson contract with the matching service to provide information about the adviser that they have learned in connection with this service, not only during student registration but also after the student registration has been deleted. It shall not be used for any purpose other than the fulfillment of the above, and no direct lesson application, etc. shall be made to the adviser included in the information without using the matching service.') }}
            </p>
            <br>
            <b>17. {{ __('message.Use of calling software') }}</b>
            <p>
                {{ __('message.17-1. Students shall use our designated online call software (hereinafter referred to as Call Software) when taking lessons.') }}<br>
                {{ __('message.17-2. The student shall follow the terms and conditions of the Terms of Use, the terms of use and other factors that provide a third party to provide the call software.') }}<br>
                {{ __('message.17-3. The student shall be able to download the call software in advance before performing a student registration and check if the call software is available in the subjects environment.') }}<br>
                {{ __('message.17-4. Our company allows students to take lessons due to the fact that the calling software could not be used in the students environment, the hardware failure required to use the calling software, improper settings, and other reasons on the part of the student. If not, we will not take any responsibility.') }}
            </p>
            <br>
            <b>18. {{ __('message.E-mail, uploaded information, etc.') }}</b>
            <p>
                {{ __('message.18-1. The Company does not take any responsibility for the content of the student, the adviser and other third parties created by the e-mail or uploaded information created.') }}<br>
                {{ __('message.18-2. Students are solely responsible for sending e-mails, uploading information, dealing with e-mail service providers, and other conditions, warranties or representations related to such correspondence. , The student agrees to indemnify us from any kind of damage or loss as a result of the response.') }}<br>
            </p>
            <br>
            <b>19. {{ __('message.Handling of confidential information, etc.') }}</b>
            <p>
                {{ __('message.19-1. Students will be required to use this service and take lessons at other occasions when they apply for registration, and the personal information of the students and other information about the students will be specified separately by the Company. (Hereinafter referred to as personal information, etc.) shall be provided to the Company. Of the personal information, etc., the information that the student has agreed in advance to post on this site after clearly stating that the company will post it on this site for the purpose of notifying the adviser separately in the input form etc. It shall be posted on the site.') }}<br>
                {{ __('message.19-2. In addition to what is specifically stipulated in this agreement, students are other students obtained in connection with the use of this service or taking lessons, not only during student registration but also after the student registration has been deleted. , Advisers and other third parties and all information about our company shall be kept strictly confidential, and may be disclosed or leaked to third parties regardless of the method, and the use of this service and the use of this service and It shall not be used for any purpose other than the fulfillment of the lesson contract entered into by the matching service.') }}<br>
                {{ __('message.19-3. Another participation in the course of this Customer, the student is another number of students, advisers and other third parties through our site or lesson. It shall not be provided to.') }}<br>
            </p>
            <br>
            <b>20. {{ __('message.Grant of license right') }}</b>
            <p>
                {{ __('message.Students will use the information that they have uploaded to us on the profile page and other web pages of our site (including, but not limited to, information generated or derived from this information) worldwide. , Public, Display, Playback, Modification, Translation, Distribution, Deletion, etc. Non-exclusive license rights with sublicense rights shall be granted free of charge and permanently. In addition, the information for which we receive license rights from students based on the main text of this article includes texts, photos, paintings, music, evaluations, and other than personal information uploaded by students to the profile page and other web pages of our site. All information of is assumed to be included.') }}
            </p>
            <br>
            <b>21. {{ __('message.Non-warranty / disclaimer') }}</b>
            <p>
                21-1. {{ __('message.The Company shall not provide any warranty for the authenticity, accuracy, certainty, reliability, usefulness, and lesson quality, reliability, usefulness, etc. of the information provided in this service. The person is not responsible for any damages or losses that are covered in connection with these.') }}<br>
                21-2. {{ __('message.The Company shall not be liable for any damage or loss incurred by the student due to suspension of the provision of this service, cancellation of student registration, interruption, change, addition, abolition, etc. of this service.') }}<br>
                {{ __('message.21-3. The Company shall not take any responsibility for damages or losses that have a third party, including other students, including other students.') }}<br>
                {{ __('message.21-4. Otherwise, the Company shall not take any responsibility for the use of the service or the loss or loss, etc. in connection with the use of the service or the lesson.') }}<br>
                {{ __('message.21-5. The Company shall not be liable for any damage or loss caused by the student to other students, advisers or other third parties in connection with the use of this service or taking lessons. increase.') }}<br>
            </p>
            <br>
            <b>22. {{ __('message.Relationship with advertisers, etc.') }}</b>
            <p>
                {{ __('message.22-1.  When a student participates in the sales promotion activities of an advertiser or other business operator (hereinafter referred to as advertiser, etc.) of the advertisement posted on this site, the student and the advertiser, etc. It is agreed that all troubles that occur should be dealt with and resolved between the students and the advertisers.') }}<br>
                {{ __('message.22-2. The Company shall take all actions by third parties, including those who are contacted and contacted by the students through the use of links set up by advertisers, websites operated by advertisers, or this service or software. We shall not be responsible.') }}<br>
                {{ __('message.22-3. Students shall agree in advance to the company that other third parties such as other third parties want to give to students.') }}<br>
            </p>
            <br>
            <b>23. {{ __('message.Suspension of provision of this service') }}</b>
            <p>
                {{ __('message.If any of the following are applicable to one of the following, it is possible to temporarily suspend the provision of this service without prior notice.') }}<br>
                ① {{ __('message.When it is unavoidable due to maintenance or construction of the equipment for this service') }}<br>
                ② {{ __('message.When a failure occurs in the equipment for this service and it is unavoidable') }}<br>
                ③ {{ __('message.When the telecommunications service becomes unavailable due to the telecommunications service provided by the telecommunications carrier') }}<br>
                ④ {{ __('message.In addition, if we determine that this service needs to be temporarily suspended due to operational or technical reasons.') }}<br>
            </p>
            <br>
            <b>24. {{ __('message.Changes / additions to the contents of this service') }}</b>
            <p>
                {{ __('message.We shall be able to change or add the contents of this service without prior notice to the student.') }}
            </p>
            <br>
            <b>25. {{ __('message.Abolition of this service') }}</b>
            <p>
                {{ __('message.25-1. We can abolish this service by notifying students.') }}<br>
                {{ __('message.If the Company abolishes this service, the amount of unused coins held by the students at the time of the abolition of this service shall be refunded by the method separately determined by the Company.') }}
            </p>
            <br>
            <b>26. {{ __('message.Attribution of rights') }}</b>
            <p>
                {{ __('message.Intellectual copyright, trademark rights, etc. regarding information distributed by the Company through the newsletter service and other information provided by this service (including but not limited to video, audio, text, photographs, images, etc.) Unless otherwise specified, all property rights, portrait rights, publicity rights and all other rights belong to the Company.') }}
            </p>
            <br>
            <b>27. {{ __('message.Revision of these Terms, etc.') }}</b>
            <p>
                {{ __('message.27-1. The Company shall be able to revise the terms of use and the terms of use established by the Company without obtaining the consent of the student.') }}<br>
                {{ __('message.27-2. The Terms and Terms of the Company defined by the Company shall be effective in accordance with Article 3, paragraph 2, from the time when we notify the students revised content.') }}
            </p>
            <br>
            <b>{{ __('message.28. Relationship with Consumer Contract Law') }}</b>
            <p>
                {{ __('message.Each provision of this Agreement shall be inconsistent with or inconsistent with each provision of the Consumer Contract Act (Act No. 61 of May 12, 2000; hereinafter referred to as the Consumer Contract Act). It shall not be effective. In addition, the part that does not take effect by the main text of this article shall be limited to the part that contradicts or conflicts with each provision of the Consumer Contract Law, and other parts of each clause including the said part and other parts other than the said clause. The terms shall remain in effect without any influence.') }}
            </p>
            <br>
            <b>29. {{ __('message.Compensation for damages') }}</b>
            <p>
                {{ __('message.In addition to what is specifically stipulated in this agreement, if the student causes damage to the Company by violating this agreement, or intentionally or negligently, all damages (including reasonable attorneys fees) to the Company. Is not limited to this), and shall be liable for immediate compensation.') }}
            </p>
            <br>
            <b>30. {{ __('message.Prohibition of transfer of rights and obligations and provision of collateral') }}</b>
            <p>
                {{ __('message.Students shall not transfer or successfully transfer or successfully or partially or part of the right obligations based on the Terms of Terms.') }}
            </p>
            <br>
            <b>31. {{ __('message.Elimination of antisocial forces') }}</b>
            <p>
                {{ __('message.Students will express that they do not apply to any of the following items, and assume that they do not apply in the future and do not apply.') }}<br>
                ① {{ __('message.Those who have not passed 5 years since they became gangsters, gangsters, gangsters, associate members of gangsters, companies related to gangsters, general assembly shops, social movements, etc. (Hereinafter, collectively referred to as gang members, etc.)') }}<br>
                ② {{ __('message.Having a relationship in which gangsters, etc. are recognized as controlling management') }}<br>
                ③ {{ __('message.Having a relationship in which gangsters, etc. are deemed to be substantially involved in management') }}<br>
                ④ {{ __('message.Having a relationship that is recognized as using gangsters, etc., for the purpose of gaining the wrongful profits of oneself or a third party, or for the purpose of damaging a third party.') }}<br>
                ⑤ {{ __('message.Having a relationship that is recognized as being involved in providing funds, etc., or providing facilities to gangsters, etc.') }}<br>
                ⑥ {{ __('message.A person who is substantially involved in his / her own management or his / her own management has a relationship that should be socially criticized with a member of a gangster, etc.') }}
            </p>
            <br>
            <b>32. {{ __('message.Governing law') }}</b>
            <p>
                {{ __('message.The governing law for this agreement shall be Japanese law.') }}
            </p>
            <br>
            <b>33. {{ __('message.Court of competent jurisdiction') }}</b>
            <p>
                {{ __('message.If there is a need for a lawsuit between the student and the Company or between the student and the adviser in connection with this service, the student and the Company will go to the Tokyo District Court or the Tokyo Summary Court according to the amount of the lawsuit. You agree to have the exclusive agreement jurisdiction court of the first instance.') }}
            </p>
            <br>
            <b>34. {{ __('message.language') }}</b>
            <p>
                {{ __('message.This agreement shall be written in Japanese and languages other than Japanese, and if the contents of this agreement created in Japanese and this agreement created in a language other than Japanese are different, it shall be written in Japanese. The contents of this agreement created shall be followed.') }}
            </p>
            <br>
            <b>35. {{ __('message.Survival clause') }}</b>
            <p>
                {{ __('message.Even if the student registration is erased, Article 5 Clause 1, Article 5, Article 5, paragraph 5, Article 5, paragraph 8, Article 5, paragraph 9, Article 6, 9 Article 10, Article 11, Article 15, Article 18, Article 22, Article 26, Article 28, Article 28, National, National Standard shall be effective.') }}
            </p>
            <br>
            <b>36. {{ __('message.Talk resolution') }}</b>
            <p>
                {{ __('message.Matters that have not been set forth in this Agreement or the matters that have doubted about interpretation of the Terms is that we will be solved with the students and our company with sincerity.') }}
            </p>
            <b>37. {{ __('message.Supplementary provisions') }}</b>
            <p>
                {{ __('message.Enacted and enforced on September 17, 2021 (Reiwa 3)') }}
            </p>
        </div>
    </section>
@endsection
