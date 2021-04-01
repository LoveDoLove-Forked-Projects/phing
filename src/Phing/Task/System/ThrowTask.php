<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://phing.info>.
 */

namespace Phing\Task\System;

use Phing\Exception\BuildException;
use Phing\Type\Reference;

/**
 * Exits the active build, giving an additional message
 * if available.
 *
 * @author  Hans Lellelid <hans@xmpl.org> (Phing)
 * @author  Nico Seessle <nico@seessle.de> (Ant)
 */
class ThrowTask extends FailTask
{
    /**
     * @var Reference
     */
    private $reference;

    /**
     * @throws BuildException
     */
    public function main()
    {
        $reffed = null !== $this->reference ? $this->reference->getReferencedObject($this->getProject()) : null;

        if (null !== $reffed && $reffed instanceof BuildException) {
            throw $reffed;
        }

        parent::main();
    }

    public function setRefid(Reference $ref)
    {
        $this->reference = $ref;
    }

    /**
     * @return Reference
     */
    public function getRefid()
    {
        return $this->reference;
    }
}
