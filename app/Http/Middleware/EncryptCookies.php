<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 17-02-2016
 * Time: 00:50
 */

namespace talenthub\Http\Middleware;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseMiddleware;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// The first two functions are identical to the originals in the parent class
// other than the sections marked "MOD". The third function is a new helper
// method, based on the duplicate() method in the parent.
class EncryptCookies extends BaseMiddleware {
    /**
     * Decrypt the cookies on the request.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function decrypt(Request $request)
    {
        foreach ($request->cookies as $key => $c)
        {
            try
            {
                $request->cookies->set($key, $this->decryptCookie($c));
            }
            catch (DecryptException $e)
            {
                // START MOD
                // Rename the cookie with a prefix of "unsigned::" to make it
                // clear this cookie wasn't signed
                $request->cookies->set("unsigned::$key", $c);
                // END MOD
                $request->cookies->set($key, null);
            }
        }
        return $request;
    }
    /**
     * Encrypt the cookies on an outgoing response.
     *
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function encrypt(Response $response)
    {
        foreach ($response->headers->getCookies() as $key => $cookie)
        {
            // START MOD
            $name = $cookie->getName();
            if (starts_with($name, 'unsigned::')) {
                // Remove the cookie with the "unsigned::" prefix
                $response->headers->removeCookie($name, $cookie->getPath(), $cookie->getDomain());
                // Set the unencrypted cookie without the prefix
                $response->headers->setCookie($this->rename(
                    $cookie, substr($name, 10)
                ));
            } else {
                // END MOD
                $response->headers->setCookie($this->duplicate(
                    $cookie, $this->encrypter->encrypt($cookie->getValue())
                ));
                // START MOD
            }
            // END MOD
        }
        return $response;
    }
    /**
     * Duplicate a cookie with a new name.
     *
     * @param  \Symfony\Component\HttpFoundation\Cookie  $cookie
     * @param  mixed  $name
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    private function rename(Cookie $c, $name)
    {
        return new Cookie(
            $name, $c->getValue(), $c->getExpiresTime(), $c->getPath(),
            $c->getDomain(), $c->isSecure(), $c->isHttpOnly()
        );
    }
}