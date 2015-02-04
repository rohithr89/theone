#include <stdio.h>

int main(void) {
	// your code goes here
	int a[5] =  {10,11,9,3,21};
	int i,hole,val,temp;
	printf("before INSERTION SORT\n");
	for(i=0;i<5;i++)
	printf("%d\t",a[i]);
	for(i=1;i<=5-1;i++) {
		val = a[i];
		hole = i;
		while((hole>0) && (a[hole-1]<val)) {
			temp=a[hole];
			a[hole] = a[hole-1];
			a[hole-1]=temp;
			hole--;
		}
		a[hole]=val;
	}
	printf("\nAfter sorting\n");
	for(i=0;i<5;i++)
	printf("%d\t",a[i]);
	return 0;
}
