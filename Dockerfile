FROM php:8.2-fpm

# تثبيت الإضافات اللازمة لنظام التشغيل و PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev

# تنظيف التخزين المؤقت
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# تثبيت إضافات PHP الضرورية لقاعدة البيانات والـ Strings
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# تحميل أحدث نسخة من Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تحديد مجلد العمل داخل السيرفر
WORKDIR /var/www
COPY . .

# تثبيت مكتبات Composer (بدون مكتبات التطوير لتسريع الأداء)
RUN composer install --no-dev --optimize-autoloader

# إعطاء الصلاحيات لمجلدات التخزين (مهم جداً للارافيل)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# تشغيل السيرفر على بورت 8080 (البورت الافتراضي لـ Render)
CMD php artisan serve --host=0.0.0.0 --port=8080
