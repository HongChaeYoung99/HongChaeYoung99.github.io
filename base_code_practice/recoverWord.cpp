#include <iostream>
using namespace std;

int main(void)
{
//	freopen("input.txt", "rt", stdin);
	char a[101], b[101];
	int pos = 0, i = 0;
	gets(a);
	for (i = 0 ; a[i]!='\0' ; i++)
	{
		if(a[i]!=' ')
		{
			if('A' <= a[i] && a[i] <= 'Z') {
				b[pos++] = a[i] + 32;
			} else {
				b[pos++] = a[i];
			}
		}
	}
	b[pos] = '\0';
	printf("%s", b);
	return 0;
}
