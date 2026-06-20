import re
import sys

file_path = r'C:\Users\Nitin\Desktop\udemyclone\lms\resources\views\welcome.blade.php'

with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

new_css = """<!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                                "secondary": "#565e74",
                                "on-error": "#ffffff",
                                "surface-container-lowest": "#ffffff",
                                "background": "#f8f9ff",
                                "primary-fixed": "#dbe1ff",
                                "surface-bright": "#f8f9ff",
                                "tertiary-fixed-dim": "#c4c7c9",
                                "outline-variant": "#c3c6d7",
                                "on-primary-fixed-variant": "#003ea8",
                                "tertiary-fixed": "#e0e3e5",
                                "on-tertiary-container": "#eff1f3",
                                "inverse-surface": "#213145",
                                "outline": "#737686",
                                "surface-container-highest": "#d3e4fe",
                                "secondary-fixed-dim": "#bec6e0",
                                "primary": "#004ac6",
                                "on-background": "#0b1c30",
                                "surface-container-low": "#eff4ff",
                                "on-primary-container": "#eeefff",
                                "on-secondary": "#ffffff",
                                "on-primary": "#ffffff",
                                "on-tertiary-fixed-variant": "#444749",
                                "on-secondary-fixed": "#131b2e",
                                "on-secondary-container": "#5c647a",
                                "inverse-primary": "#b4c5ff",
                                "error": "#ba1a1a",
                                "on-surface": "#0b1c30",
                                "surface-variant": "#d3e4fe",
                                "on-error-container": "#93000a",
                                "tertiary": "#525657",
                                "on-secondary-fixed-variant": "#3f465c",
                                "primary-fixed-dim": "#b4c5ff",
                                "surface-container-high": "#dce9ff",
                                "surface-dim": "#cbdbf5",
                                "surface": "#f8f9ff",
                                "on-surface-variant": "#434655",
                                "surface-tint": "#0053db",
                                "error-container": "#ffdad6",
                                "inverse-on-surface": "#eaf1ff",
                                "on-tertiary": "#ffffff",
                                "primary-container": "#2563eb",
                                "secondary-container": "#dae2fd",
                                "surface-container": "#e5eeff",
                                "on-tertiary-fixed": "#191c1e",
                                "on-primary-fixed": "#00174b",
                                "secondary-fixed": "#dae2fd",
                                "tertiary-container": "#6b6e70"
                        },
                        "borderRadius": {
                                "DEFAULT": "0.25rem",
                                "lg": "0.5rem",
                                "xl": "0.75rem",
                                "full": "9999px"
                        },
                        "spacing": {
                                "container-max": "1280px",
                                "stack-lg": "48px",
                                "gutter": "24px",
                                "margin-mobile": "16px",
                                "stack-md": "24px",
                                "base": "8px",
                                "margin-desktop": "32px",
                                "stack-sm": "12px"
                        },
                        "fontFamily": {
                                "headline-md": ["Inter"],
                                "body-md": ["Inter"],
                                "label-sm": ["Inter"],
                                "display-lg": ["Inter"],
                                "headline-lg": ["Inter"],
                                "label-md": ["Inter"],
                                "headline-sm": ["Inter"],
                                "headline-lg-mobile": ["Inter"],
                                "body-lg": ["Inter"]
                        },
                        "fontSize": {
                                "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                                "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                                "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                                "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                                "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                                "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                                "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                                "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
                        }
                    },
                },
            }
        </script>
        <style>
            body { font-family: 'Inter', sans-serif; }
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                vertical-align: middle;
            }
            .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
            .soft-lift:hover { 
                box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1); 
                transform: translateY(-2px);
            }
            .hero-pattern {
                background-image: radial-gradient(circle at 2px 2px, #e2e8f0 1px, transparent 0);
                background-size: 40px 40px;
            }
        </style>
"""

# Replace the styles block
content = re.sub(r'<!-- Styles / Scripts -->.*?(?=</head>)', new_css, content, flags=re.DOTALL)

# Replace the body class
content = re.sub(r'<body[^>]*>', '<body class="bg-background text-on-background">', content)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Updated welcome.blade.php successfully.")
