系统文档
- [系统常见问题](./document.php?f=faq)
- [如何避免由于编译器差别带来的错误](./document.php?f=compiler)
- [编译环境说明](./document.php?f=system)

***

# 常见问题

有问题要问？下面是一些常见的问题，也许下面的答案对你有所帮助。

***

### 判题系统如何编译我所提交的代码？

我们在 Linux 操作系统下运行判题系统，我们使用 GNU GCC / G++ 来编译 C / C++ 代码，使用 Free Pascal 来编译 pascal 代码, 以及使用 sun-java-jdk 来编译 java 代码。我们使用的编译指令是：

语言	                | 编译参数
------------------------|-----------------------------
C						| gcc Main.c -o Main -fno-asm -O2 -Wall -lm --static -std=c99 -DONLINE_JUDGE
C++						| g++ Main.cc -o Main -fno-asm -O2 -Wall -lm --static -DONLINE_JUDGE
Pascal					| fpc Main.pas -oMain -O1 -Co -Cr -Ct -Ci
Java*					| javac -J-Xms32m -J-Xmx256m Main.java

*请注意， Java 在判题时具有两秒的额外运行时间和 512M 的额外运行内存。

### 我应该怎样处理输入输出？

你的程序总是应该从 __标准输入__ 处理输入并输出到 __标准输出__ 。

例如，你可以在C里面用`scanf`或者在C++里面使用`cin`读取数据；在C里面使用`printf`或者在C++里面使用`printf`进行输出。

你不可以直接操作文件，否则你将得到 `运行时错误`。

** 对于初学者，请不要“告诉”OJ多余的信息（比如 `printf("Enter a number: ");`），这些多余的输出会作为你的答案的一部分，毫无疑问，OJ会认为你的答案是错误的。**

用户程序不允许操作文件（例如`fopen`等函数），否则你可能会得到`Runtime Error(运行时错误)、Restricted Functions(限制使用的函数)或者Wrong Answer(错误答案)`等结果。

注意，使用`scanf/printf`通常比`cin/cout`更快，所以如果某个程序的输入/输出量很大，使用`cin/cout`可能会得到一个`时间超限`。

下面是一个Problem A+B的示例代码(C++):

```cpp
#include <iostream>
using namespace std;
  
int main()
{
    int a, b;
    cin >> a >>  b;
    cout << a + b <<  endl;
    return 0;
}
```

特别注意，C/C++源码的main函数的返回值必须是int，在程序正常结束的情况下应当返回0，否则可能会得到`编译错误` .

下面是一个Problem A+B的示例代码(C):
```c	
#include  <stdio.h>
int main()
{
    int a, b;
    scanf("%d %d", &a, &b);
    printf("%d\n", a + b);
    return 0;
}

```
下面是一个Problem A+B的示例代码(Java):
```Java	
//The Java compiler is jdk 1.5+, below is a program for problem 1001
import java.io.*;
import java.util.*;
public class Main
{
    public static void main(String args[]) throws Exception
    {
        Scanner cin=new Scanner(System.in);
        int a = cin.nextInt(), b = cin.nextInt();
        System.out.println(a + b);
    }
}
```

### 使用 C / C++ 时如何处理 64 位整形变量的输入和输出？

你应当使用 `%lld` 或 `%llu`来进行格式化输入输出(scanf/printf)。 `__int64`是微软VC++中使用的，本系统并不支持。

### 为何我在我的电脑可以正常编译，提交代码却得到了编译错误？

也许你在使用和该判题系统不同的编译器，或者使用了不同的编译参数或标准。你可以作一个快速的问题检查，检查你的代码有没有如下问题：

 - `main` 函数必须返回 `int` 类型.
 - `itoa` 不是一个 ANSI C 标准函数.
 - `__int64` 不是一个 ANSI C 标准类型. 你应该使用 `long long` 来替代它.

你也可以直接查看我们返回的编译错误信息来查看错误原因。

### 如何判断输入的结束?

大多数情况下，题目描述的输入数据有给出明确的结束标志，按照要求编写代码即可；但是有些情况要求你一直读入到输入结束并被关闭，你需要在输入时判断。例如，使用`scanf/cin/getchar`等函数的返回值是否等于EOF来判断，或者`feof(stdin)`都可以。详情请参照Problem A+B后面的样例。 

### 那些判题状态的含义是什么？

判题状态		| 含义
----------------|----------
提交中			| 你的提交正在排队等待判题
等待重判		| 因为一些原因，系统将对该提交进行重(Chóng)判
编译中			| 你的代码正在被编译
判题中			| 判题系统正在检验您提交的答案是否正确
答案正确		| 你解决了这道问题
格式错误		| 你的答案在格式上与正确答案有所偏差，例如，你的答案漏掉了一个空格等格式问题
答案错误		| 你的答案不正确 (注意: 有时一些严重的格式问题也会被判为答案错误而不是格式错误)
时间超限		| 你的程序运行时间超过了题目限制
内存超限		| 你的程序运行内存超过了题目限制
输出超限		| 你的程序输出的答案过长（超过了正确答案长度的两倍）
运行时错误		| 你的程序出现了运行时错误，通常可能是你试图使用被禁止的函数或者数组下标越界等原因导致
编译失败		| 我们无法成功编译你提交的代码，试试检查代码是否有语法错误或者你是否错误选择了提交的语言

### 问题页面中每行前面的那些符号是什么意思？

图标                       | 含义 
---------------------------|-----------------------------
<i style='color: green;' class='fa fa-check'/> | 当前登陆用户 __已经解决__ 的问题
<i style='color: orange;' class='fa fa-dot-circle-o'/> | 当前登陆用户 __尝试解决过__ (但没有解决) 的问题
<i class='fa fa-clock-o'/> | 问题 __在某个尚未开始的竞赛中__ 被使用 (仅管理员可见)
<i class='fa fa-lock'/>    | 问题被 __锁定__ (隐藏) (仅管理员可见)


 
<script>
$("table").addClass("table table-hover");
</script>