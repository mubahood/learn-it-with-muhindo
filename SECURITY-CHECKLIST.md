# Security Checklist for Public Hosting

## Before Making Your Site Public:

### 1. Database Security
- [ ] Change MySQL root password from default
- [ ] Create a dedicated database user (not root)
- [ ] Update `config.php` with new credentials
- [ ] Remove remote MySQL access (only localhost)

### 2. File Security
- [ ] Remove all test files (test.php, test-form.html, test-connection.php)
- [ ] Delete setup.php and database.sql
- [ ] Change admin password from '4321' to strong password
- [ ] Ensure .htaccess is protecting sensitive files
- [ ] Set proper file permissions (644 for files, 755 for directories)

### 3. PHP Security
- [ ] Disable display_errors in production
- [ ] Enable error logging only
- [ ] Keep PHP updated (current: 8.2.20)
- [ ] Disable dangerous functions in php.ini

### 4. XAMPP Security
```bash
# Run XAMPP security script
sudo /Applications/XAMPP/xamppfiles/xampp security
```

### 5. SSL/HTTPS
- [ ] Use Cloudflare Tunnel (provides automatic SSL)
- [ ] Or configure Let's Encrypt SSL certificate
- [ ] Force HTTPS in .htaccess (already configured)

### 6. Application Security
- [ ] Test SQL injection protection (already implemented)
- [ ] Verify XSS protection (already implemented)
- [ ] Test CSRF protection
- [ ] Implement rate limiting for form submissions
- [ ] Add Google reCAPTCHA to enrollment form

### 7. Monitoring
- [ ] Set up error log monitoring
- [ ] Check logs regularly: `/Applications/XAMPP/xamppfiles/logs/`
- [ ] Monitor enrollment submissions for spam
- [ ] Set up uptime monitoring (e.g., UptimeRobot)

### 8. Backup
- [ ] Set up automatic database backups
- [ ] Backup files regularly
- [ ] Store backups off-site (cloud storage)

### 9. Performance
- [ ] Enable GZIP compression (already in .htaccess)
- [ ] Optimize images
- [ ] Enable browser caching (already configured)
- [ ] Consider CDN for static assets

### 10. Computer Requirements
- [ ] Keep computer powered on 24/7
- [ ] Ensure stable internet connection
- [ ] Configure sleep settings (never sleep)
- [ ] Set up automatic restart after power failure
- [ ] Ensure adequate cooling/ventilation

## Commands to Secure XAMPP:

```bash
# Change MySQL root password
/Applications/XAMPP/xamppfiles/bin/mysql -u root -p
# Then run: ALTER USER 'root'@'localhost' IDENTIFIED BY 'strong_password_here';

# Check PHP security settings
grep -E "display_errors|expose_php|allow_url_fopen" /Applications/XAMPP/xamppfiles/etc/php.ini

# View error logs
tail -f /Applications/XAMPP/xamppfiles/logs/error_log

# Check Apache access logs
tail -f /Applications/XAMPP/xamppfiles/logs/access_log
```

## Files to Delete Before Going Public:

```bash
cd /Applications/MAMP/htdocs/learn-it-with-muhindo
rm -f test.php test-form.html test-connection.php setup.php database.sql
rm -f config-production.php enroll-production.php .htaccess-production
rm -f DEPLOYMENT-INSTRUCTIONS.md
```

## Rate Limiting (Add to functions.php):

```php
// Add this function to prevent spam
function checkRateLimit($ip, $action = 'enrollment', $limit = 5, $window = 3600) {
    $cacheFile = sys_get_temp_dir() . "/rate_limit_{$action}_{$ip}.txt";
    
    if (file_exists($cacheFile)) {
        $data = json_decode(file_get_contents($cacheFile), true);
        if ($data['count'] >= $limit && (time() - $data['timestamp']) < $window) {
            return false;
        }
        if ((time() - $data['timestamp']) >= $window) {
            $data = ['count' => 0, 'timestamp' => time()];
        }
    } else {
        $data = ['count' => 0, 'timestamp' => time()];
    }
    
    $data['count']++;
    file_put_contents($cacheFile, json_encode($data));
    return true;
}
```

## Monitoring Tools:

1. **Uptime Monitoring**: https://uptimerobot.com (free)
2. **Error Tracking**: Check logs daily
3. **Security Scanning**: https://sitecheck.sucuri.net
4. **Speed Test**: https://pagespeed.web.dev

## Emergency Contacts:

- Cloudflare Support: https://support.cloudflare.com
- XAMPP Forum: https://community.apachefriends.org
- Keep hosting provider contact ready

## Regular Maintenance:

- Daily: Check error logs
- Weekly: Review enrollment submissions, check uptime
- Monthly: Update PHP/XAMPP, backup database, security audit
- Quarterly: Review and update security measures
