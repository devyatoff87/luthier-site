<?php
// ============================================
// 1. DATEN (ROHE ARRAYS)
// ============================================

$heroData = [
    'title' => "Meisterwerkstatt für Saiteninstrumente",
    'subtitle' => "Geigen, Gitarren & Mandolinen – handgefertigt mit Leidenschaft",
    'image' => "images/hero.jpg",
    'button_text' => "Dienstleistungen entdecken"
];

$welcomeText = "Seit über 20 Jahren baue und restauriere ich Saiteninstrumente in Handarbeit. Jedes Instrument, das meine Werkstatt verlässt, ist ein Unikat – gefertigt mit Liebe zum Detail und dem besten Holz aus europäischen Wäldern.";

$services = [
    [
        "name" => "Instrumentenbau",
        "description" => "Individuelle Gitarren, Geigen oder Mandolinen nach deinen Wünschen – handgefertigt vom ersten Schnitt bis zum letzten Lack.",
        "price" => "ab 1200€",
        "duration" => "4-6 Wochen",
        "icon" => "🔨"
    ],
    [
        "name" => "Reparatur & Restauration",
        "description" => "Vintage-Instrumente wieder zum Leben erwecken. Rissreparaturen, Stegneuanfertigung, Bünde richten – alles möglich.",
        "price" => "40-150€",
        "duration" => "3-5 Tage",
        "icon" => "🛠️"
    ],
    [
        "name" => "Setup & Intonation",
        "description" => "Perfekte Bespielbarkeit: Sattelhöhe, Bundreinheit, Halskrümmung – dein Instrument spielt sich wie neu.",
        "price" => "65€",
        "duration" => "1 Tag",
        "icon" => "🎸"
    ],
    [
        "name" => "Oberflächenbehandlung",
        "description" => "Oberflächenbehandlung mit Schellack oder Öl – schützt das Holz und lässt es atmen.",
        "price" => "ab 180€",
        "duration" => "1-2 Wochen",
        "icon" => "✨"
    ]
];

$testimonials = [
    [
        "name" => "Anna K.",
        "instrument" => "Akustikgitarre",
        "quote" => "Meine selbstgebaute Gitarre klingt unglaublich. Die Beratung war hervorragend und die Handwerkskunst atemberaubend.",
        "rating" => 5
    ],
    [
        "name" => "Johann M.",
        "instrument" => "Geige",
        "quote" => "Die Restauration meiner Großvaters-Geige hat mich zu Tränen gerührt. Sie klingt wie am ersten Tag.",
        "rating" => 5
    ],
    [
        "name" => "Sabine W.",
        "instrument" => "E-Gitarre",
        "quote" => "Das Setup hat meine Gitarre komplett verwandelt. Endlich keine Bundschwingungen mehr!",
        "rating" => 4
    ]
];

$contact = [
    "name" => "Max Meister",
    "email" => "info@luthier-werkstatt.de",
    "phone" => "030 12345678",
    "address" => "Musterstraße 123, 10115 Berlin",
    "hours" => "Mo-Fr: 10-18 Uhr | Sa: nach Vereinbarung"
];

// ============================================
// 2. FUNKTIONEN (LOGIK)
// ============================================

function getHeroData() {
    global $heroData;
    return $heroData;
}

function getWelcomeText() {
    global $welcomeText;
    return $welcomeText;
}

function getServices() {
    global $services;
    return $services;
}

function getServiceByName($name) {
    $services = getServices();
    foreach ($services as $service) {
        if ($service['name'] === $name) {
            return $service;
        }
    }
    return null;
}

function getServicesPreview($limit = 3) {
    return array_slice(getServices(), 0, $limit);
}

function getTestimonials() {
    global $testimonials;
    return $testimonials;
}

function getTestimonialsByRating($minRating = 4) {
    $all = getTestimonials();
    return array_filter($all, function($item) use ($minRating) {
        return $item['rating'] >= $minRating;
    });
}

function getContact() {
    global $contact;
    return $contact;
}
?>