<?hh // partial
// generated by idl-to-hni.php

/* This function returns an array with the current available SPL classes.
 * @return array - Returns an array containing the currently available SPL
 * classes.
 */
function spl_classes(): array {
  return array (
    AppendIterator::class => AppendIterator::class,
    ArrayIterator::class => ArrayIterator::class,
    ArrayObject::class => ArrayObject::class,
    BadFunctionCallException::class => BadFunctionCallException::class,
    BadMethodCallException::class => BadMethodCallException::class,
    CachingIterator::class => CachingIterator::class,
    CallbackFilterIterator::class => CallbackFilterIterator::class,
    Countable::class => Countable::class,
    DirectoryIterator::class => DirectoryIterator::class,
    DomainException::class => DomainException::class,
    EmptyIterator::class => EmptyIterator::class,
    FilesystemIterator::class => FilesystemIterator::class,
    FilterIterator::class => FilterIterator::class,
    GlobIterator::class => GlobIterator::class,
    InfiniteIterator::class => InfiniteIterator::class,
    InvalidArgumentException::class => InvalidArgumentException::class,
    IteratorIterator::class => IteratorIterator::class,
    LengthException::class => LengthException::class,
    LimitIterator::class => LimitIterator::class,
    LogicException::class => LogicException::class,
    MultipleIterator::class => MultipleIterator::class,
    NoRewindIterator::class => NoRewindIterator::class,
    OuterIterator::class => OuterIterator::class,
    OutOfBoundsException::class => OutOfBoundsException::class,
    OutOfRangeException::class => OutOfRangeException::class,
    OverflowException::class => OverflowException::class,
    ParentIterator::class => ParentIterator::class,
    RangeException::class => RangeException::class,
    RecursiveArrayIterator::class => RecursiveArrayIterator::class,
    RecursiveCachingIterator::class => RecursiveCachingIterator::class,
    RecursiveCallbackFilterIterator::class => RecursiveCallbackFilterIterator::class,
    RecursiveDirectoryIterator::class => RecursiveDirectoryIterator::class,
    RecursiveFilterIterator::class => RecursiveFilterIterator::class,
    RecursiveIterator::class => RecursiveIterator::class,
    RecursiveIteratorIterator::class => RecursiveIteratorIterator::class,
    RecursiveRegexIterator::class => RecursiveRegexIterator::class,
    RecursiveTreeIterator::class => RecursiveTreeIterator::class,
    RegexIterator::class => RegexIterator::class,
    RuntimeException::class => RuntimeException::class,
    SeekableIterator::class => SeekableIterator::class,
    SplDoublyLinkedList::class => SplDoublyLinkedList::class,
    SplFileInfo::class => SplFileInfo::class,
    SplFileObject::class => SplFileObject::class,
    SplFixedArray::class => SplFixedArray::class,
    SplHeap::class => SplHeap::class,
    SplMinHeap::class => SplMinHeap::class,
    SplMaxHeap::class => SplMaxHeap::class,
    SplObjectStorage::class => SplObjectStorage::class,
    SplObserver::class => SplObserver::class,
    SplPriorityQueue::class => SplPriorityQueue::class,
    SplQueue::class => SplQueue::class,
    SplStack::class => SplStack::class,
    SplSubject::class => SplSubject::class,
    SplTempFileObject::class => SplTempFileObject::class,
    UnderflowException::class => UnderflowException::class,
    UnexpectedValueException::class => UnexpectedValueException::class,
  );
}

/* This function returns a unique identifier for the object. This id can be
 * used as a hash key for storing objects or for identifying an object.
 * @param object $obj - Any object.
 * @return string - A string that is unique for each currently existing object
 * and is always the same for each object.
 */
<<__Native>>
function spl_object_hash(object $obj): string;

/* This function returns low level raw pointer the object. Used by closure and
 * internal purposes.
 * @param object $obj - Any object.
 * @return int - Low level ObjectData pointer.
 */
<<__Native("NoInjection")>>
function hphp_object_pointer(object $obj): int;

/* This function returns this object if present, or NULL.
 * @return mixed - This object.
 */
<<__Native("NoInjection")>>
function hphp_get_this(): mixed;

/* This function returns an array with the names of the interfaces that the
 * given class and its parents implement.
 * @param mixed $obj - An object (class instance) or a string (class name).
 * @param bool $autoload - Whether to allow this function to load the class
 * automatically through the __autoload magic method.
 * @return mixed - An array on success, or FALSE on error.
 */
<<__Native>>
function class_implements(mixed $obj,
                          bool $autoload = true): mixed;

/* This function returns an array with the name of the parent classes of the
 * given class.
 * @param mixed $obj - An object (class instance) or a string (class name).
 * @param bool $autoload - Whether to allow this function to load the class
 * automatically through the __autoload magic method.
 * @return mixed - An array on success, or FALSE on error.
 */
<<__Native>>
function class_parents(mixed $obj,
                       bool $autoload = true): mixed;

/* This function returns an array with the names of the traits that the given
 * class uses.
 * @param mixed $obj - An object (class instance) or a string (class name).
 * @param bool $autoload - Whether to allow this function to load the class
 * automatically through the __autoload magic method.
 * @return mixed - An array on success, or FALSE on error.
 */
<<__Native>>
function class_uses(mixed $obj,
                    bool $autoload = true): mixed;

/* Calls a function for every element in an iterator.
 * @param mixed $obj - The class to iterate over.
 * @param mixed $func - The callback function to call on every element. The
 * function must return TRUE in order to continue iterating over the iterator.
 * @param array $params - Arguments to pass to the callback function.
 * @return mixed - Returns the iteration count.
 */
<<__Native>>
function iterator_apply(mixed $obj,
                        mixed $func,
                        array $params = []): mixed;

/* Count the elements in an iterator.
 * @param mixed $obj - The iterator being counted.
 * @return mixed - The number of elements in iterator.
 */
<<__Native>>
function iterator_count(mixed $obj): mixed;

/* Copy the elements of an iterator into an array.
 * @param mixed $obj - The iterator being copied.
 * @param bool $use_keys - Whether to use the iterator element keys as index.
 * @return mixed - An array containing the elements of the iterator.
 */
<<__Native>>
function iterator_to_array(mixed $obj,
                           bool $use_keys = true): array;

/* This function can be used to manually search for a class or interface using
 * the registered __autoload functions.
 * @param string $class_name - The class name being searched.
 */
<<__Native>>
function spl_autoload_call(string $class_name): void;

/* This function can modify and check the file extensions that the built in
 * __autoload() fallback function spl_autoload() will be using.
 * @param string $file_extensions - When calling without an argument, it
 * simply returns the current list of extensions each separated by comma. To
 * modify the list of file extensions, simply invoke the functions with the
 * new list of file extensions to use in a single string with each extensions
 * separated by comma.
 * @return string - A comma delimited list of default file extensions for
 * spl_autoload().
 */
<<__Native>>
function spl_autoload_extensions(string $file_extensions = ""): string;

/* Get all registered __autoload() functions.
 * @return mixed - An array of all registered __autoload functions. If the
 * autoload stack is not activated then the return value is FALSE. If no
 * function is registered the return value will be an empty array.
 */
<<__Native>>
function spl_autoload_functions(): mixed;

/* Register a function with the spl provided __autoload stack. If the stack is
 * not yet activated it will be activated.  If your code has an existing
 * __autoload function then this function must be explicitly registered on the
 * __autoload stack. This is because spl_autoload_register() will effectively
 * replace the engine cache for the __autoload function by either
 * spl_autoload() or spl_autoload_call().  If there must be multiple autoload
 * functions, spl_autoload_register() allows for this. It effectively creates
 * a queue of autoload functions, and runs through each of them in the order
 * they are defined. By contrast, __autoload() may only be defined once.
 * @param mixed $autoload_function - The autoload function being registered.
 * If no parameter is provided, then the default implementation of
 * spl_autoload() will be registered.
 * @param bool $throws - This parameter specifies whether
 * spl_autoload_register() should throw exceptions on error.
 * @param bool $prepend - If true, spl_autoload_register() will prepend the
 * autoloader on the autoload stack instead of appending it.
 * @return bool - Returns TRUE on success or FALSE on failure.
 */
<<__Native>>
function spl_autoload_register(mixed $autoload_function = null,
                               bool $throws = true,
                               bool $prepend = false): bool;

/* Unregister a function from the spl provided __autoload stack. If the stack
 * is activated and empty after unregistering the given function then it will
 * be deactivated.  When this function results in the autoload stack being
 * deactivated, any __autoload function that previously existed will not be
 * reactivated.
 * @param mixed $autoload_function - The autoload function being unregistered.
 * @return bool - Returns TRUE on success or FALSE on failure.
 */
<<__Native>>
function spl_autoload_unregister(mixed $autoload_function): bool;
