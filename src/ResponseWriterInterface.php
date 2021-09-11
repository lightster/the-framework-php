<?php

namespace The;

interface ResponseWriterInterface extends WriterInterface
{
    /**
     * @param int $code
     * @return static
     */
    public function withStatus(int $code);

    /**
     * @param string $name
     * @param string $value
     * @return static
     */
    public function withHeader(string $name, string $value);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setSessionParam(string $key, string $value);

    /**
     * @param string $key
     * @param string $value
     * @param array $options
     */
    public function setCookie(string $key, string $value, array $options = []);
}
